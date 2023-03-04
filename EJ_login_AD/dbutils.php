<?php
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


function insertUserPassword($con,$usu,$passMd5,$nombre,$apellido)
{
  try
  {
    $sql = "INSERT INTO USUARIOS(USUARIO,PASSWORD,NOMBRE,APELLIDO) VALUES (:USUARIO,:PASSWORD,:NOMBRE,:APELLIDO)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':USUARIO', $usu);
    $stmt->bindParam(':PASSWORD', $passMd5);
    $stmt->bindParam(':NOMBRE', $nombre);
    $stmt->bindParam(':APELLIDO', $apellido);
    $stmt->execute();
   }
  catch (PDOException $ex)
  {
     throw new Exception("Error Insert".$ex->getMessage());
  }
}


?>