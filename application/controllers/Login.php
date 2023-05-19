<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();	
        date_default_timezone_set('America/lima');
		$this->load->model('Usuario_model','usuario');
    }

	public function index()
	{
		$this->load->view('login_view');
	}

    public function validarInicioSesion(){

        $email = $_POST['email'];
        $password = $_POST['password'];

		$where['email'] = $email;
		$where['password'] =hash ("sha256", $password);

		$usuarioEncontrado = $this->usuario->buscarUsuario($where);
        
		if($usuarioEncontrado) {
			$data['usuario'] = $usuarioEncontrado;
			$this->load->view('inicio_view',$data);
		}else{
			$this->session->set_flashdata('message','No se encontraron coincidencias con las credenciales ingresadas');
			redirect('Login/index');
		}
    }

	public function registroUsuario(){

		$response['success'] = false;
		$response['texto'] = 'No se pudo registrar, intentelo nuevamente';

		$nombres = $_POST['nombres'];
		$primerApellido = $_POST['primerApellido'];
		$segundoApellido = $_POST['segundoApellido'];
		$email = $_POST['email'];
		$nombreUsuario = $_POST['nombreUsuario'];
		$contrasenha = $_POST['contrasenha'];
		$fechaCreacion = date('Y-m-d H:i:s');

		$data["nombres"] = $nombres;
		$data["primerApellido"] = $primerApellido;
		$data["segundoApellido"] = $segundoApellido;
		$data["email"] = $email;
		$data["nombreUsuario"] = $nombreUsuario;
		$data["contrasenha"] =  hash ( "sha256", $contrasenha);
		$data["fechaCreacion"] = $fechaCreacion;
		$id = '00000001';
		$ultimoId = $this->usuario->obtener_ultimo_id();
		if($ultimoId){
			$ultimoId = strval($ultimoId);
			$ultimoId++;
			$id = str_pad($ultimoId,8,"0",STR_PAD_LEFT);
		};

		$data["id"] = $id;
		
		$insert = $this->usuario->registrarUsuario($data);
		if($insert){
			$response['success'] = true;
			$response['texto'] = 'Se registro exitosamente';
		}
		
		header('Content-Type: application/json');
        echo json_encode($response);
	}

	public function crearTabla(){
		
		try{
			$this->usuario->crearTabla();
			$resultado = true;
        }catch(Exception $e){
            $resultado = false;
        }

		if($resultado){
			$response['icon'] = "success";
			$response['texto'] = 'Se creo tabla exitosamente';
		}else{
			$response['icon'] = "warning";
			$response['texto'] = 'Algo malo ocurrio';
		}

		
		header('Content-Type: application/json');
        echo json_encode($response);
	}
}


