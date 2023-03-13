<?php

require_once("dbutils.php");

//Capturas las herramientas de SESSION
session_start();

//Verificar el usuario que ejecuta esta acción
require("header.php");

//Destruyes las SESSION
session_destroy();

//Rediriges al index
header("Location: index.php");

?>