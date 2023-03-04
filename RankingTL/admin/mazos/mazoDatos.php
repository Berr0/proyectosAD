<!DOCTYPE html>
<html lang="en">
    <form action="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

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
            $nom = $_POST['nombreMazo'];
            $mazo = getMazoFromNombre($db, $nom);
            echo "\n" . "El mazo es: " . $mazo[0][0]["NOMBRE"];
            break;
        case 'Anadir':
            require_once("../BBDD/dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['nombreMazo'];
            $tag = substr($nom, 0, 3);
            $desc = $_POST['desc'];
            $hort = addMazoByNombre($db, $nom, $tag, $desc);
            echo "\n" . "El añadir es: " . $hort[0][0]["NOMBRE"].",". $tag;
            break;
        case 'Borrar':
            require_once("../BBDD/dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['nombreMazo'];
            $maz = borrarMazoFromNombre($db, $nom);
            echo "\n" . "El Borrar es: " .$nom;
            break;
        case 'Modificar':
            require_once("../BBDD/dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['nombreMazo'];
            $tag = "tag";
            $hort = modificarMazoFromNombre($db, $nom,$tag);
            echo "\n" . "El Modificar es: " . $tag;
            break;
    }
?>
  
</body>
</form>
</html>