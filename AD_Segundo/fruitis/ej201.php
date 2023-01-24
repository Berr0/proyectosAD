<?php
require_once("dbutils.php");
$db = conectarDB();
var_export($db);

?>
<!DOCTYPE html>
<html lang="en">
    <form action="ej202.php" method="post">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <br>
    <p>Tamaño</p>
    <input type="text" name="tamano" id="txt" placeholder="Inserta Tamaño de hortaliza">
    <p>Color</p>
    <input type="text" name="color" id="txt" placeholder="Inserta Color de hortaliza">
    <br><br>
    <button id="btn" type="submit">Filtro</button>
</body>
</form>
</html>