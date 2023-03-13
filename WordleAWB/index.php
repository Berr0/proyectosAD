


<!DOCTYPE html>
<html>
  <head>
    <title>Wordle Dinámico</title>

    <?php 
    require_once("./BBDD/dbutils.php");
    $db = conectarDB();
    ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    <style>
html {
  background-image: url('https://upload.wikimedia.org/wikipedia/commons/8/80/Backgorund.gif');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
body {
  background-image: url('https://upload.wikimedia.org/wikipedia/commons/8/80/Backgorund.gif');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  text-align: center;

}
      h1 {
        font-size: 48px;
        margin-top: 10px;
      }
      .rank, .player-input, .score {
        display: inline-block;
        text-align: center;
        vertical-align: top;
        margin: 20px;
        margin-left: 60px;
        margin-right: 100px
      }
      .rank {
        font-size: 36px;
        width: 30px;
        margin-left: 150px;
        margin-top: 2px;
      }
      .jugador-input {
        display: inline-block;
        vertical-align: top;
        font-size: 18px;
        width: 30px;
        text-align: center;
        margin-right: 15px;
        margin-left: 15px;
        margin-bottom: 20px;
        font-size: 28px;
        text-transform: uppercase;
      }
      .player-input {
        display: inline-block;
        vertical-align: top;
        font-size: 18px;
        width: 30px;
        text-align: center;
        margin-right: 100px;
        margin-left: 60px;
        margin-bottom: 20px;
        font-size: 28px;
        text-transform: uppercase;
      }
      .player- {
        font-size: 24px;
        width: 50px;
        margin-top: 2px;
      }
      .score {
        font-size: 36px;
        width: 70px;
        margin-top: 2px;
      }
      .rank-text, .player-text, .score-text {
        display: inline-block;
        vertical-align: top;
        font-size: 18px;
        width: 30px;
        text-align: center;
        margin-right: 100px;
        margin-left: 60px;
        margin-bottom: 20px;
        font-size: 28px;
        text-transform: uppercase;
      }
      .vrTal{
        margin-top: 20px;
      }
      .hrEspecial{
        width: 550px;
 /* center my element in the webpage */
        margin-left: auto;
        margin-right: auto;
        margin-top: auto;
        margin-bottom: auto;
      }
</style> 

  
</head>
<body>
  <h1>
    WORDLE_AWB
  </h1>
  <?php
  if (isset($_POST['intentos']) && !isset($_POST['skip'])) {
    $intentos = $_POST['intentos'];
    $palabra = $_POST['word'];
    $charsNum = strlen($palabra);
    $letras = str_split($palabra);
    $letrasEnPalabra = array();
    for ($j=0; $j < $charsNum; $j++) {
      if (isset($_POST['char'.$j])) {
        if ($_POST['char'.$j] == $letras[$j]) {
          $letrasEnPalabra[$j] = 'green';
        } else if (strpos($palabra, $_POST['char'.$j]) !== false) {
          $letrasEnPalabra[$j] = 'yellow';
        } else {
          $letrasEnPalabra[$j] = 'red';
        }
      } else {
        $letrasEnPalabra[$j] = '';
      }
    }
  } else {
    $intentos = 1;
    // Obtener una palabra aleatoria de la base de datos
    $numPalabras = count(getAllPalabras($db)[0]);
    $rand = rand(0, $numPalabras-1);
    $palabra = getPalabraFromID($db, $rand+1);
    $palabra = $palabra[0]["PALABRA"];
    $charsNum = strlen($palabra);
    $letras = str_split($palabra);
    $letrasEnPalabra = array_fill(0, $charsNum, '');
  }

  // Mostrar el número de intentos
  echo "Intento #$intentos<br><br>";

  // Formulario con los inputs de letras
  echo '<form method="POST">';
  for ($j=0; $j < $charsNum; $j++) {
    $color = $letrasEnPalabra[$j];
    if ($color != '') {
      echo '<input type="text" class="jugador-input" name="char'.$j.'" maxlength="1" value="'.$letras[$j].'" style="background-color: '.$color.';" disabled>';
    } else

{
echo '<input type="text" class="jugador-input" name="char'.$j.'" maxlength="1" value="" required>';
}
}
echo '<input type="hidden" name="intentos" value="'.($intentos+1).'">';
echo '<input type="hidden" name="word" value="'.$palabra.'">';
echo '<input type="submit" value="Comprobar">';
echo '</form>';

// Botón para saltar la palabra
echo '<br><form method="POST">';
echo '<input type="hidden" name="skip" value="1">';
echo '<input type="submit" value="Saltar palabra">';
echo '</form>';

// Mostrar la palabra si se han acabado los intentos
if ($intentos == 5) {
echo '<br><h2>Lo siento, has perdido. La palabra era "'.$palabra.'"</h2>';
}

?>
</body>
</html>
