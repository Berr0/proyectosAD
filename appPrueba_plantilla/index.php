<?php
session_start();
require_once("dbutils.php");

$loginIncorrecto = false;

if(isset($_POST["usuario"]) && isset($_POST["password"])){
  $usuario = $_POST["usuario"];
  $password = $_POST["password"];
  

  $conexion = conectarDB();
  //$fila = getUserPassword($conex,$usuario,md5($password));
  

  $fila = execute_query(
    $conexion,
    "SELECT * FROM usuarios WHERE usuario=:usuario AND clave=:clave",
    array(":usuario" => $usuario, ":clave" => md5($password))
  );
  var_dump($fila);
  //Si la fila existe por la query se añade el nombre a la session y vamos al admin1 
  if($fila){
    $_SESSION['userApp']=$usuario;
    header("Location: admin1.php");
    exit();
  }
}


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="margin-top:20px">
      <form method="POST">
       <input class="form-control" type="text" name="usuario" placeholder="Usuario..." required/><br>
       <input class="form-control" type="password" name="password" placeholder="Password..." required/><br>
      <button class="btn btn-primary">Login</button>
        <?php
            if(isset($_POST["password"])) echo "<p>Contraseña incorrecta</p>"; 
  ?>
    </form>
    </div>
  </body>
</html>