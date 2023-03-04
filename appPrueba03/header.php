<?php
if(!isset($_SESSION['userApp'])){
  header("location:index.php");
  exit();
}

// set tiempo expiración
// código, properties o bd
 $conexion = conectarDB();
  //$fila = getUserPassword($conex,$usuario,md5($password));
  $nombreTimeOut = "TIMEOUT_SESSION";
  $fila = execute_query(
    $conexion,
    "SELECT * FROM propiedades WHERE nombre=:nombre",
    array(":nombre" => $nombreTimeOut)); 
$minutosExpirar = $fila[0]['VALOR'];
echo "minutos:".$minutosExpirar;
if (isset($_SESSION["tiempo_ultimo_submit"]))
{
  $segundosInactivo = time() - $_SESSION["tiempo_ultimo_submit"];
  if ($segundosInactivo >= ($minutosExpirar*60))
  {
    session_destroy();
    header("Location: index.php");
    exit();
  }
}
$_SESSION["tiempo_ultimo_submit"]=time();



  
?>