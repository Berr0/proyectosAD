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

function getAllMazos($conDb)
{
    //Bien
    $vectorTotal = array();
    try {
        $sql = "SELECT * FROM MAZOS";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt -> execute(array());
        while ($fila = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $vectorTotal[] = $fila;
        }
        } catch (PDOException $ex) {
        echo ("Error al conectar con la base de datos".$ex->getMessage());
    }
    return $vectorTotal;
}


function addMazoByNombre($conDB, $nom, $tag, $desc)
{
    try
    {
      $sql = "INSERT INTO MAZOS(NOMBRE,TAG,DESCRIPCION) VALUES (:NOMBRE,:TAG,:DESCR)";
      $stmt = $conDB->prepare($sql);
      $stmt->bindParam(':NOMBRE', $nom);
      $stmt->bindParam(':TAG', $tag);
      $stmt->bindParam(':DESCR', $desc);
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
  
  
  
/*
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
*/


//FUNCIONES DE CARTA

function getCartaFromFecha($conDb, $fech)
{
    //Bien
    $vectorTotal = array();
    try {
        $sql = "SELECT * FROM CARTAS WHERE FECHA = :FEC";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt -> execute(array(":FEC"=>$fech));
        while ($fila = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $vectorTotal[] = $fila;
        }
        } catch (PDOException $ex) {
        echo ("Error al conectar con la base de datos".$ex->getMessage());
    }
    return $vectorTotal;
}



function addImageToCarta($conDb, $fech, $image)
{
    try {
        $sql = "INSERT INTO CARTAS (FECHA, IMAGEN) VALUES (:FECHA, :IMAGEN)";
        $stmt = $conDb->prepare($sql);
        $stmt->bindParam(':FECHA', $fech, PDO::PARAM_STR);
        $stmt->bindParam(':IMAGEN', $image, PDO::PARAM_STR);
        $stmt->execute();
        } catch (PDOException $ex) {
            echo ("Error al insertar carta en la base de datos". $ex->getMessage());
        }
        return $stmt->rowCount();
    }

     //DELETE FROM CARTAS WHERE `CARTAS`.`ID` = 2


function BorrarCartaFromFecha($conDB, $fec)
{
    //Bien
    $vectorTotal = array();
    try
    {
      $sql = "DELETE FROM CARTAS WHERE FECHA=:FEC";
      $stmt = $conDB->prepare($sql);
      $stmt->bindParam(':FEC', $fec);
      $stmt->execute();
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en borrar Carta".$ex->getMessage());
    }
    return $result;
  }


function addCartaByFechaAndDesc($conDB, $nom, $tag, $desc)
{
    try
    {
        
      $sql = "INSERT INTO MAZOS(NOMBRE,TAG,DESCRIPCION) VALUES (:NOMBRE,:TAG,:DESCR)";
      $stmt = $conDB->prepare($sql);
      $stmt->bindParam(':NOMBRE', $nom);
      $stmt->bindParam(':TAG', $tag);
      $stmt->bindParam(':DESCR', $desc);
      $stmt->execute();
     }
    catch (PDOException $ex)
    {
      echo ("Error en insertarHortaliza".$ex->getMessage());
    }
    return $conDB->lastInsertId();
  }

  function ModificarCartaFromFecha($conDB, $nom, $fec, $newfec, $desc)
  {
    $result =0;
    try
    {
        //sql update where tag is updated in mazos table

        // UPDATE `CARTAS` SET `FECHA` = '2491' WHERE `CARTAS`.`ID` = 1 
        
      $sql = "UPDATE `CARTAS` SET DESCRIPCION` = $desc, FECHA=:newfec WHERE FECHA=:fec";
      $stmt = $conDB->prepare($sql);
      $stmt->bindParam(':nom', $nom,PDO::PARAM_STR);
      $stmt->bindParam(':fec', $fec,PDO::PARAM_STR);
      $stmt->bindParam(':newfec', $newfec,PDO::PARAM_STR);
      $stmt->bindParam(':desc', $desc,PDO::PARAM_STR);
      $stmt->execute();
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en ModificarMazoFromNombre".$ex->getMessage());
    }
    return $result;
  }

  /*
Falta cambiar en la BBDD la descripcion de las cartas para que permitan ser null al crearse
Tenemos que buscar como meter imagenes en la base de datos correctamente, de momento tengo esto,
pero no está comprobado
*/ 

?>