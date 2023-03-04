<?php
if(!isset($_SESSION['userApp'])){
  header("location:index.php");
  exit();
}

// set tiempo expiración
// código, properties o bd
//leer minutos expirar de base de datos
$minutosExpirar = 0.2;
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