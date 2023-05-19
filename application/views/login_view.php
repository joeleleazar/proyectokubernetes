
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
        <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <link href="<?= base_url() ?>assets/css/signin.css" rel="stylesheet" >
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form id="frmInicioSesion" action="<?= base_url() ?>Login/validarInicioSesion" method="post">
    <i class="fa fa-user fa-5x"></i>
    <h1 class="h3 mb-3 fw-normal">Inicie sesión</h1>
    <button class="w-100 btn btn-lg btn-warning mb-5" id="btnCrearTabla" type="button">Crear tabla usuarios</button>
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Iniciar sesión</button>
    <button class="w-100 btn btn-lg btn-secondary" data-bs-toggle="modal" data-bs-target="#registroModal" type="button">Registrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
  </form>
</main>

<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <form id="frmRegistroUsuario" method="post" action="welcome">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registro de usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Ingresar nombres</label>
                <input class="form-control" name="nombres" id="nombres" required>
              </div>
              <div class="form-group">
                <label>Ingresar primer apellido</label>
                <input class="form-control" name="primerApellido" id="primerApellido" required>
              </div>
              <div class="form-group">
                <label>Ingresar segundo apellido</label>
                <input class="form-control" name="segundoApellido" id="segundoApellido" required>
              </div>
              <div class="form-group">
                <label>Ingresar email</label>
                <input class="form-control" name="email" id="email" required>
              </div>
              <div class="form-group">
                <label>Ingresar nombre usuario</label>
                <input class="form-control" minlength="8" maxlength="15" name="nombreUsuario" id="nombreUsuario" required>
              </div>
              <div class="form-group">
                <label>Ingresar contraseña</label>
                <input class="form-control" type="password" name="contrasenha" id="contrasenha" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" type="button">Registrar</button>
          </div>
        </form>
      </div>
  </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url()?>assets/js/app.js?version=1.0"></script>
<?php if($this->session->flashdata('message')){?>
  <script>
  Toast.fire({
                        icon: 'error',
                        title: '<?= $this->session->flashdata('message') ?> '
                    })
  </script>
<?php } ?>

  </body>
</html>
