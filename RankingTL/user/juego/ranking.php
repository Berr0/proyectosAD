<!DOCTYPE html>
<html>
  <head>
  <?php
        require_once("../BBDD/dbutils.php");
        $db = conectarDB();
    ?>
    <meta charset="UTF-8">
    <title>80's Arcade Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.cdnfonts.com/css/arcade-classic" rel="stylesheet">
    <style>
      /* Add your CSS styles here */
      body {
        font-family: 'ArcadeClassic', sans-serif;
        color: white;
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
      
    </style>
  </head>
  <form action="ranking.php" method="post">

  <body>
    <h1>Leaderboard</h1>
    <div class="rank-text">Rank</div>
    <div class="player-text">Name</div>
    <div class="score-text">Score</div>
    <?php
     $jug = getAllJugadores($db);

     //Tenemos que sacar todos los jugadores de la base de datos
     //Una vez sacados, iteramos hasta un tope de 10 y mostramos el ranking
     //con los usuarios ya metidos, falta comprobar que puntuación tiene el usuario
     //que estamos metiendo y ponerlos donde sea correcto, además tendremos que 
     //eliminar el usuario que no aparezca en el ranking de la base de datos
     //Todas las funciones de sql para meter, sacar, modificar y borrar

    //do an isset of post 
    if (isset($_POST['guardarPuntos'])) {
      $nomJug = $_POST['char1'].$_POST['char2'].$_POST['char3'];
      $punt = $_POST['puntuacion_hidden']; 
      modificarJugadorFromNombre($db, $nomJug,$punt);
      $jugadores = getAllJugadores($db);
      $ranking = $jugadores[0][0]["PUNTOS"];
      for ($i = 0; $i < 10; $i++) {
        //  echo '<option value="'. $mazo[0][$i]["NOMBRE"]. '">'. $mazo[0][$i]["NOMBRE"]. '</option>';
        $nom[$i] = $jugadores[0][$i];
      }
    }else{
      $punt = $_POST['puntuacion']; 
      //Guardamos en un hidden la puntuación para usarla después en el p
      echo '<input type="hidden" name="puntuacion_hidden" value="'.$_POST['puntuacion'].'">';
      addJugadorByPuntos($db,$punt);
      $jugadores = getAllJugadores($db);
      $ranking = $jugadores[0][0]["PUNTOS"];
       for ($i = 0; $i < 10; $i++) {
        //  echo '<option value="'. $mazo[0][$i]["NOMBRE"]. '">'. $mazo[0][$i]["NOMBRE"]. '</option>';
      $nom[$i] = $jugadores[0][$i];
       } 
       
    }
    ?>

    <?php
    for ($i=0; $i < 10 ; $i++) {
      if($nom[$i]["NOMBRE"] != null || isset($_POST['guardarPuntos'])){
        //filter by first 3 ranks and make the font color gold for the 1st, silver for the 2nd, bronze for the 3rd
        echo '
        <br><br>
        <div class="rank">'.($i+1).'.</div>
        <div class="vr"></div>
        <p type="text" class="player-input" maxlength="1"> ' . $nom[$i]["NOMBRE"] . ' </p>
        <div class="vr vrTal"></div>

        <div class="score">' . $nom[$i]["PUNTOS"] . '</div>
        <hr class="border border-danger border-2 opacity-50 hrEspecial">
        ';
      }else{
        echo '
        <br><br>
        <div class="rank">'.($i+1).'.</div>
        <div class="vr"></div>
        <input type="text" class="jugador-input" name="char1" maxlength="1">  
        <input type="text" class="jugador-input" name="char2" maxlength="1">  
        <input type="text" class="jugador-input" name="char3" maxlength="1">  
        <div class="vr"></div>

        <div class="score">' . $nom[$i]["PUNTOS"] . '</div>
        <hr class="border border-danger border-2 opacity-50 hrEspecial">

        ';
      }
    }
    ?>
<br>

    <button name="guardarPuntos" type="submit"> Guardar puntos </button>


    
    
    <!-- <div class="rank">2.</div>
    <p class="player-input" ></p>
    <p class="player-input" ></p>
    <p class="player-input" ></p>
    <div class="score"> 9000</div> -->
    <!-- Add more scores and players here -->

    <?php
    //php function that displays the leaderboard

    ?>
  </body>
  </form>

</html>