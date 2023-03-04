<?php

function conectarDB()
{
  try
  {
    $db = new PDO("mysql:host=localhost;dbname=DB_FRUITIS;charset=utf8mb4","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $db; 
  }
  catch (PDOException $ex)
  {
    echo ("Error al conectar".$ex->getMessage());
  }
}
// FUNCIONES SELECT

function getHortalizaFromTam2($conDb, $tam)
{
  try
  {
    $sql = "SELECT * FROM HORTALIZAS WHERE TAM=:tamAux";
    $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
    $stmt->execute(array(":tamAux"=>$tam));
    $fila = $stmt->fetchAll();
   }
  catch (PDOException $ex)
  {
    echo ("Error getHortalizaFromTam2".$ex->getMessage());
  }
  return $fila;
}
function getHortalizaFromTam($conDb, $tam)
{
  try
  {
    $sql = "SELECT * FROM HORTALIZAS WHERE TAM=".$tam;
    $stmt = $conDb->query($sql);
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
   }
  catch (PDOException $ex)
  {
    echo ("Error al conectar".$ex->getMessage());
  }
  return $fila;
}
function getAllHortalizasFromTam($conDb, $tam)
{
  $vectorTotal = array();
  try
  {
    $sql = "SELECT * FROM HORTALIZAS WHERE TAM=".$tam;
    $stmt = $conDb->query($sql);
    while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      $vectorTotal[]=$fila;
    }
   }
  catch (PDOException $ex)
  {
    echo ("Error al conectar".$ex->getMessage());
  }
  return $vectorTotal;
}
function getAllHortalizasFromTam2($conDb, $tam)
{
  $vectorTotal = array();
  try
  {
    $sql = "SELECT * FROM HORTALIZAS WHERE TAM=:tamAux";
    $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
    $stmt->execute(array(":tamAux"=>$tam));
    while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      $vectorTotal[]=$fila;
    }
   }
  catch (PDOException $ex)
  {
    echo ("Error al conectar".$ex->getMessage());
  }
  return $vectorTotal;
}

function getAllHortalizasFromTamColor($conDb, $tam, $color)
{
  $vectorTotal = array();
  try
  {
    
    $arr = array();
    $sql = "SELECT * FROM HORTALIZAS";
    if($tam != ""){
      $arr[":tamAux"] = $tam;
      $sql = "SELECT * FROM HORTALIZAS WHERE TAM=:tamAux";
    } 
    if($color != ""){
      $arr[":colorAux"] = $color;
      $sql = "SELECT * FROM HORTALIZAS WHERE COLOR=:colorAux";
    } 
    if(count($arr) == 2) $sql = "SELECT * FROM HORTALIZAS WHERE TAM=:tamAux and COLOR=:colorAux";
    $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
    $stmt->execute($arr);
    while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      $vectorTotal[]=$fila;
    }
   }
  catch (PDOException $ex)
  {
    echo ("Error al conectar".$ex->getMessage());
  }
  return $vectorTotal;
}



// UPDATE




function modificarHortalizaFromTamAndColor($conDb, $tam,$color,$nombre)
{
  $result =0;
  try
  {
    $sql = "UPDATE HORTALIZAS SET NOMBRE=:nombre WHERE COLOR=:color AND TAM=:tam";
    $stmt = $conDb->prepare($sql);
    $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
    $stmt->bindParam(':color', $color,PDO::PARAM_STR);
    $stmt->bindParam(':tam', $tam,PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->rowCount();
   }
  catch (PDOException $ex)
  {
    echo ("Error en modificarHortalizaFromTamAndColor".$ex->getMessage());
  }
  return $result;
}


// INSERT


function insertarHortaliza($con,$nombre,$color,$tam)
{
  try
  {
    $sql = "INSERT INTO HORTALIZAS(NOMBRE,COLOR,TAM) VALUES (:NOMBRE,:COLOR,:TAM)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':NOMBRE', $nombre);
    $stmt->bindParam(':COLOR', $color);
    $stmt->bindParam(':TAM', $tam);
    $stmt->execute();
   }
  catch (PDOException $ex)
  {
    echo ("Error en insertarHortaliza".$ex->getMessage());
  }
  return $con->lastInsertId();
}


//BORRAR



function borrarHortaliza($con,$id)
{
  try
  {
    $sql = "DELETE FROM HORTALIZAS WHERE ID=:ID";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':ID', $id);
    $stmt->execute();
    $result = $stmt->rowCount();
   }
  catch (PDOException $ex)
  {
    echo ("Error en borrarHortaliza".$ex->getMessage());
  }
  return $result;
}


?>