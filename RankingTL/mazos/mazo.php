<!DOCTYPE html>
<html lang="en">
<form action="mazoDatos.php" method="post">

<head>
<?php
require_once("../BBDD/dbutils.php");
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
    <div id="div1">
    <?php
    
    ?>
    <select name="opcionSeleccionada" id="select1">
        <option value="Seleccionar">Seleccionar mazo</option>
        <option value="Anadir">Añadir mazo</option>
        <option value="Borrar">Borrar mazo</option>
        <option value="Modificar">Modificar mazo</option>
    </select>
</div>
    <div id="div2">
    <br>

    <script>
        //When option modificar is selected an input text is placed 
        var objetoSelector = document.querySelector('select')
        objetoSelector.addEventListener('change', function(evento) {
            if (objetoSelector.value == 'Anadir') {
            document.querySelector('#div2').removeChild(document.getElementById('txtmod'));
            }else if (objetoSelector.value == 'Borrar') {
            //Hacer llamada a base de datos y añadir los datos en las options de un select
            //Borra campo de texto creado al poner modificar
            document.querySelector('#div2').removeChild(document.getElementById('txtmod'));
            }else  if (evento.target.value == 'Modificar') {
                document.querySelector('#div2').innerHTML += '<br><br><input type="text" name="tagMod" id="txtmod" placeholder="Un tag de mazo a modificar">'
            }else  if (evento.target.value == 'Seleccionar') {
                document.querySelector('#div2').removeChild(document.getElementById('txtmod'));
            }
        })
    </script>
    

    <input type="text" name="nombreMazo" id="txt" placeholder="Un nombre de mazo">
    <button id="btn" type="submit">Go</button>
    <br><br>
    <textarea name="descMazo" id="descMazo" cols="30" rows="10"></textarea>
    </div>
</body>
</form>
</html>