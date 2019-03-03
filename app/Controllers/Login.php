<?php
require_once WEBROOT."/Models/Usuario.php";

class Login extends Controller
{ 
  public function Index()
  {
    self::$layout = "Auth";
    self::vista("Auth/Login");

  }

  public function logear()
  {     
    $u = new Usuario();

    $codigo = Request::post("codigo");
    $pass =  Request::post("password");
    
    $usuario = $u->getUsuario($codigo);

    if (count($usuario) >= 1 && password_verify($pass,$usuario['password'])) {
      $md5 = md5(time().$codigo);
      $_SESSION['md5'] = $md5;
      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nombre'] = $usuario['nombre'];
      $_SESSION['apellido'] = $usuario['apellido'];
      $_SESSION['codigo'] = $usuario['codigo'];
      $_SESSION['rol'] = $usuario['rol'];
      
      header("Location: /");
      
    }else{
      $_SESSION['msg'] = "Nombre de usuario o contraseña incorrectos";
      header("Location: /login");
      $_SESSION['codigo'] = $codigo;
    }
  }

  public function cerrar_sesion()
  {
    unset($_SESSION['md5']);
    session_destroy();
    header("Location: /");

  }
}
 