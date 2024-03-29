<!DOCTYPE html>
<html lang="en">
<form action="cartasDato.php" method="post">

<head>
<?php
require_once("../BBDD/dbutils.php");
$db = conectarDB();
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

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
<center>
    
    <title>Admin RankingTL Dashboard</title>
</head>
<body>
    <h1>Admin RankingTL Dashboard</h1>
    <h2>Welcome to Admin RankingTL Dashboard for Cards</h2>
    <div id="div1">
    <?php
    
    ?>
       <div class="col-md-3">

    <select class="form-select" name="opcionSeleccionada" id="select1">
        <option value="Seleccionar">Seleccionar carta</option>
        <option value="Anadir">Añadir carta</option>
        <option value="Borrar">Borrar carta</option>
        <option value="Modificar">Modificar carta</option>
    </select>
    <div id="div2">
    <br>


    <input type="text" class="form-control" name="fechaCarta" id="txt" placeholder="Una fecha de carta">
    <br>
    <input type="text" class="form-control" name="mazoCarta" id="txt" placeholder="Un nombre de mazo">
    <br>
    <button id="btn" class="btn btn-primary form-control" type="submit">Go</button>
    <br><br>
    <textarea class="form-control" name="descMazo" id="descMazo" cols="30" rows="10"></textarea>
    </div>
</div>
    </center>
</body>
</form>
</html>