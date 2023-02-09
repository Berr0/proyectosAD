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
            require_once("./BBDD/dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['nombreAtraccion'];
            $atracc = getAtraccionFromNombre($db, $nom);
            echo "<center>" . "\n" . "<h1>". "La atraccion es: " . $atracc[0][0]["NOMBRE"]."<h1>" ."</center>";
            break;
        case 'Anadir':
            require_once("./BBDD/dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['nombreAtraccion'];
            $tag = substr($nom, 0, 3);
            $desc = $_POST['desc'];
            $atracc = addAtraccionByNombreAndTematica($db, $nom, $tag);
            echo "<center>" . "\n" . "<h1>". "El añadir es: " . $atracc[0][0]["NOMBRE"].",". $tag."<h1>" ."</center>";
            break;
        case 'Borrar':
            require_once("./BBDD/dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['nombreAtraccion'];
            $maz = borrarAtraccionFromNombre($db, $nom);
            echo "\n" . "El Borrar es: " .$nom."<h1>" ."</center>";;
            break;
        case 'Modificar':
            require_once("./BBDD/dbutils.php");
            $db = conectarDB();
            //Export $_POST 
            $nom = $_POST['nombreAtraccion'];
            $them = $_POST['tematica'];
            $hort = modificarAtraccionFromNombre($db, $nom, $them);
            echo "<center>" . "\n" . "<h1>". "\n" . "El Modificar es: " . $tag."<h1>" ."</center>";;
            break;
    }
?>
  
</body>
</form>
</html>