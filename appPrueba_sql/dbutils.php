<?php

function execute_query($conexion, $query, $arguments=null, $type_fetch=PDO::FETCH_ASSOC){
  $comando = $conexion -> prepare($query);
  $comando -> execute($arguments);
  return $comando -> fetchAll($type_fetch);
}

function conectarDB()
{
  try
  {
    $db = new PDO("mysql:host=localhost;dbname=APP_PRUEBA;charset=utf8mb4","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $db; 
  }
  catch (PDOException $ex)
  {
    echo ("Error al conectar".$ex->getMessage());
  }
}

function getUserPassword($con,$user,$passMd5)
{
    try
  {
    $sql = "SELECT * FROM USUARIOS WHERE USUARIO=:usu AND PASSWORD=:pass";
    $stmt = $con->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
    $stmt->execute(array(":usu"=>$user,":pass"=>$passMd5));
    $fila = $stmt->fetch();
   }
  catch (PDOException $ex)
  {
    echo ("Error getUserPassword".$ex->getMessage());
  }
  return $fila;
}


function insertUserPassword($con,$usu,$passMd5,$nombre)
{
  try
  {
    $sql = "INSERT INTO usuarios VALUES (:USUARIO, :NOMBRE, :PASSWORD)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':USUARIO', $usu);
    $stmt->bindParam(':PASSWORD', $passMd5);
    $stmt->bindParam(':NOMBRE', $nombre);
    $stmt->execute();
   }
  catch (PDOException $ex)
  {
     throw new Exception("Error Insert".$ex->getMessage());
  }
}


?>