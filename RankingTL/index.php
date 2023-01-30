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
    <title>Admin RankingTL Dashboard</title>
</head>
<body>
    <h1>Admin RankingTL Dashboard</h1>
    <h2>Welcome to Admin RankingTL Dashboard</h2>
    <div>
    <?php
    
    ?>
    <select name="opcionSeleccionada" id="select1">
        <option value="Seleccionar">Seleccionar mazo</option>
        <option value="Añadir">Añadir mazo</option>
        <option value="Borrar">Borrar mazo</option>
        <option value="Modificar">Modificar mazo</option>
    </select>
    <br>
    <br>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            document.getElementById("select1").addEventListener("change", function(event) {
                //create <p> with value of <select>
                var select = document.getElementById("select1");
                var option = document.createElement("option");
                option.text = select.value;
                select.parentNode.insertBefore(option, select.nextSibling);
            }); 
            });
    </script>
    

    <input type="text" name="nombreMazo" id="txt" placeholder="Un nombre de mazo">
    <button id="btn" type="submit">Go</button>
    </div>
</body>
</form>
</html>