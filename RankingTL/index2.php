<!DOCTYPE html>
<html lang="en">
    <form action="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin RankingTL Check Deck</title>
</head>
<body>
    <br>
    <br>
    <?php
    //if the $_POST['opcionSeleccionada'] is Seleccionar
    switch ($_POST['opcionSeleccionada']) {
        case 'Seleccionar':
            require_once("dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['nombreMazo'];
            $hort = getMazoFromNombre($db, $nom);
            echo "\n" . "El mazo es: " . $hort[0][0]["NOMBRE"];
            break;
        case 'Añadir':
            require_once("dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['nombreMazo'];
            $hort = getMazoFromNombre($db, $nom);
            echo "\n" . "El mazo es: " . $hort[0][0]["NOMBRE"];
            break;
        case 'Borrar':
            require_once("dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['nombreMazo'];
            $hort = getMazoFromNombre($db, $nom);
            echo "\n" . "El mazo es: " . $hort[0][0]["NOMBRE"];
            break;
        case 'Modificar':
            require_once("dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['nombreMazo'];
            $hort = getMazoFromNombre($db, $nom);
            echo "\n" . "El mazo es: " . $hort[0][0]["NOMBRE"];
            break;
    }
?>
  
</body>
</form>
</html>