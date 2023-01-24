<?php
    function conectarDB(){
        try{
            $db = new PDO("mysql:host=localhost;dbname=DB_FRUITIS;charset=utf8mb4","root","");
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


function getAllHortalizasFromTam($conDB, $tam)
{
    $vectorTotal = array();
    try {

        $sql = "SELECT * FROM HORTALIZAS WHERE TAM = $tam";
        $stmt = $conDB->query($sql);
        while ($fila = $conDB->fetch($sql)) {
                $vectorTotal[] = $fila;
        }

    } catch (PDOException $ex) {
        echo ("Error al conectar con la base de datos" . $ex->getMessage());
    }
    echo $vectorTotal;
    return $vectorTotal;
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