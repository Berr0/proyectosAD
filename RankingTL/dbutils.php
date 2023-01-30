<?php
    function conectarDB(){
        try{
            $db = new PDO("mysql:host=localhost;dbname=DB_RANKING;charset=utf8mb4","root","");
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $db;
        }
        catch(PDOException $ex){
            echo ("Error al conectar".$ex->getMessage());
        }
    }

function getMazoFromNombre($conDb, $nom)
{
    //Bien
    $vectorTotal = array();
    try {
        $sql = "SELECT * FROM MAZOS WHERE NOMBRE = :NOM";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt -> execute(array(":NOM"=>$nom));
        while ($fila = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $vectorTotal[] = $fila;
        }
        } catch (PDOException $ex) {
        echo ("Error al conectar con la base de datos".$ex->getMessage());
    }
    return $vectorTotal;
}


function addMazoByNombre($conDB, $nom, $tag)
{
    try
    {
      $sql = "INSERT INTO MAZOS(NOMBRE,TAG) VALUES (:NOMBRE,:TAG)";
      $stmt = $conDB->prepare($sql);
      $stmt->bindParam(':NOMBRE', $nom);
      $stmt->bindParam(':TAG', $tag);
      $stmt->execute();
     }
    catch (PDOException $ex)
    {
      echo ("Error en insertarHortaliza".$ex->getMessage());
    }
    return $conDB->lastInsertId();
  }


function BorrarMazoFromNombre($conDB, $nom)
{
    //Bien
    $vectorTotal = array();
    try
    {
      $sql = "DELETE FROM MAZOS WHERE NOMBRE=:NOM";
      $stmt = $conDB->prepare($sql);
      $stmt->bindParam(':NOM', $nom);
      $stmt->execute();
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en borrarHortaliza".$ex->getMessage());
    }
    return $result;
  }

  function ModificarMazoFromNombre($conDB, $nom, $tag)
  {
    $result =0;
    try
    {
        //sql update where tag is updated in mazos table

        
      $sql = "UPDATE MAZOS SET TAG=:tag WHERE NOMBRE=:nom";
      $stmt = $conDB->prepare($sql);
      $stmt->bindParam(':nom', $nom,PDO::PARAM_STR);
      $stmt->bindParam(':tag', $tag,PDO::PARAM_STR);
      $stmt->execute();
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en ModificarMazoFromNombre".$ex->getMessage());
    }
    return $result;
  }
  
  
  

function getAllHortalizasFromTamAndColor($conDB, $tam,$color,$bool){
    $vectorTotal = array();
    try {
        if ($bool) {
            $sql = "SELECT * FROM HORTALIZAS";
            $stmt = $conDB->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stmt->execute(array());
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $vectorTotal[] = $fila;
            }
        }
    }
    catch (PDOException $ex) {
        echo ("Error al conectar con la base de datos". $ex->getMessage());
    }
    try {
        if (!$bool) {
            $sql = "SELECT * FROM HORTALIZAS WHERE TAM = :TAM AND COLOR = :COLOR";
            $stmt = $conDB->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stmt->execute(array(":TAM" => $tam, ":COLOR" => $color));
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $vectorTotal[] = $fila;
            }
        }
}
catch (PDOException $ex) {
        echo ("Error al conectar con la base de datos". $ex->getMessage());
    }
    return $vectorTotal;
}
?>