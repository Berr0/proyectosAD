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
  <form >
  <body>
    <h1>
      WORDLE_AWB
    </h1>
  <?php
  if (isset($_POST['intentos'])) {
    $intentos = $_POST['intentos'];
    $intentos = $intentos++;
  } else {
    $intentos = 1;
  }
  $rand = rand();
  $Num_de_palabras = getAllPalabras($db);
  $num = rand(1, count($Num_de_palabras[0]));
  $palabra = getPalabraFromID($db,$num);
  $word = $palabra[0]["PALABRA"];
  $charsNum = strlen($word);
  $letras = str_split($word);
  echo $intentos;
    echo '<br><br><div class="rank">'.($i+1).'.</div>';
    echo '<div class="vr"></div>';
    for ($j=0; $j < $charsNum; $j++) { 
      echo '<input type="text" class="jugador-input" name="char'.$j.'" maxlength="1">';
    }
    echo '<div class="vr"></div><div class="score">' . $nom[$i]["PUNTOS"] . '</div><hr class="border border-danger border-2 opacity-50 hrEspecial">';
    echo "<input type='hidden' value='$intentos' name='intentos'>"
?>
<!-- 
  Todo esto se ejecutaría al pulsar el boton 

  Tendría que sacar la palabra y recorrerla y ver si esta está en el indice de los inputs, si no es fallo, luego 
  revisar si existe en la palabra y en base a estos dos ifs, poner el color del input como amarillo/rojo/verde
------------------------------------------------------------------------------------------------------------------------

  Para montar esto, tendremos que poner una etiqueta form que permita pasar por el post los datos que nos interesen
  Lo vamos filtrando con un hidden que tendrá un valor incremental por cada intento

 -->
<br>


  <button class="btn btn-primary">Adivinar</button>
  </body>
  </form>
</html>
