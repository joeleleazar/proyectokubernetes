<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model{
	function __construct() {
    }

    public function registrarUsuario($data){

        $sql = 'INSERT INTO usuario (nombres, primerApellido, segundoApellido, email, nombreUsuario, contrasenha, fechaCreacion, id) VALUES (';
            $sql .= "'". $data['nombres']. "',";
            $sql .= "'". $data['primerApellido']. "',";
            $sql .= "'". $data['segundoApellido']. "',";
            $sql .= "'". $data['email']. "',";
            $sql .= "'". $data['nombreUsuario']. "',";
            $sql .= "'". $data['contrasenha']. "',";
            $sql .= "'". $data['fechaCreacion']. "',";
            $sql .= "'". $data['id']."'";
            $sql .= ')';

        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function buscarUsuario($where){
        $sql = "SELECT 
        nombres,
        primerApellido as apepat,
        segundoApellido as apemat,
        email,
        nombreUsuario as usuario,
        fechaCreacion as creacion,
        id FROM usuario where email = '". $where['email']."' and contrasenha = '". $where['password'] ."' limit 1";
        $query = $this->db->query($sql);

        if ( $query->num_rows() > 0 )
        {
            return $query->row_array();
        }  else {
            return false;
        }
    }

    public function obtener_ultimo_id(){
        $this->db->select('id');
        $this->db->from('usuario');
        $this->db->order_by('id desc');
        $this->db->limit(1);
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            return $query->row()->id;
        }  else {
            return false;
        }
    }

    public function crearTabla(){
        
        $query = "CREATE TABLE if not exists usuario(
            id varchar(8) NOT NULL,
            nombres varchar(200) NOT NULL,
            primerapellido varchar(100) NOT NULL,
            segundoapellido varchar(100) NOT NULL,
            email varchar(200) NOT NULL,
            nombreusuario varchar(15) NOT NULL,
            contrasenha varchar(64) NOT NULL,
            fechacreacion timestamp NOT NULL
        );";

        $this->db->query($query);

    }
}