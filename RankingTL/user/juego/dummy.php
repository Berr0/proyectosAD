<!DOCTYPE html>
<html lang="en">
    <form action="ranking.php" method="post">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Admin RankingTL Check Deck</title>
</head>
<center>
<body>
    <br>
    <br>
    <?php
    //if the $_POST['opcionSeleccionada'] is Seleccionar

    echo "Estás jugando en el mazo ".$_POST['opcionSeleccionada']."";
    echo '<br>';
    echo '<br> <input placeholder="Introduce una puntuación" type="text" name="puntuacion" id="punt"> '
?>
    <br>
    <br>
    <div class="col-md-1">
        <button class="btn btn-primary form-control" id="btn" type="submit">Go</button></div>
</body>
</center>
</form>
</html>