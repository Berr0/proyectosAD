54<!DOCTYPE html>
<html lang="en">
<head>
     <?php
        require_once("../BBDD/dbutils.php");
        $db = conectarDB();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego cartas</title>
</head>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<center>
    <h1>Timeline</h1>
    <form action="dummy.php" method="post">
    <br>
            <div class="col-md-3">
                <select class="form-select" name="opcionSeleccionada" id="select1">
                    <option value="" disabled selected>Selecciona una Baraja</option>
                    <?php
                    $mazo = getAllMazos($db);
                    $total = count($mazo[0]);
                    echo "<h1>$total</h1>";
                    for ($i = 0; $i < $total; $i++) {
                        echo '<option value="'. $mazo[0][$i]["NOMBRE"]. '">'. $mazo[0][$i]["NOMBRE"]. '</option>';
                    }
                    ?>
                </select>
                <br>
                <div class="row">
                    <div class="col-md-12">
                    <button class="btn btn-primary">Jugar</button>
                </form>
            </div>
</div>
    </div></center>
</body>
</html>