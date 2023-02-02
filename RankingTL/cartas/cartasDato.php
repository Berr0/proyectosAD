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
            require_once("../BBDD/dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['fechaCarta'];
            $mazo = getCartaFromFecha($db, $nom);
            echo "\n" . "La carta es: " . $mazo[0][0]["NOMBRE"];
            break;
        case 'Anadir':
            require_once("../BBDD/dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['fechaCarta'];
            $tag = substr($nom, 0, 3);
            $desc = $_POST['desc'];
            $hort = addMazoByNombre($db, $nom, $tag, $desc);
            echo "\n" . "El añadir es: " . $hort[0][0]["NOMBRE"].",". $tag;
            break;
        case 'Borrar':
            require_once("../BBDD/dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['fechaCarta'];
            $maz = BorrarMazoFromNombre($db, $nom);
            echo "\n" . "El Borrar es: " .$nom;
            break;
        case 'Modificar':
            require_once("../BBDD/dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['fechaCarta'];
            $tag = $_POST['tagMod'];
            $hort = ModificarMazoFromNombre($db, $nom,$tag);
            echo "\n" . "El Modificar es: " . $tag;
            break;
    }
?>
  
</body>
</form>
</html>