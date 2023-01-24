<!DOCTYPE html>
<html lang="en">
<form action="index2.php" method="post">

<head>
<?php
require_once("dbutils.php");
$db = conectarDB();
var_export($db);
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <br>
    <input type="text" name="nombre" id="txt" placeholder="Un nombre de mazo">
    <button id="btn" type="submit">MAZO</button>
</body>
</form>
</html>