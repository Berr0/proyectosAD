<?php
require_once("dbutils.php");

$myconection = conectarDB();

//var_export($myconecction);
$miFila = getHortalizaFromTam($myconection, 20);
//var_export($miFila);
//echo "El color es ".$miFila["COLOR"];


 $miFila2 = getAllHortalizasFromTam($myconection, 20);
var_export($miFila2);

?>