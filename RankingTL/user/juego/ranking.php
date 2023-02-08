<!DOCTYPE html>
<html>
  <head>
  <?php
        require_once("../BBDD/dbutils.php");
        $db = conectarDB();
    ?>
    <meta charset="UTF-8">
    <title>80's Arcade Leaderboard</title>
    <style>
      /* Add your CSS styles here */
      body {
        font-family: 'arcade';
        color: white;
        text-align: center;
      }
      h1 {
        font-size: 48px;
        margin-top: 100px;
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
      }
      .player-input {
        font-size: 24px;
        width: 50px;
      }
      .player- {
        font-size: 24px;
        width: 50px;
      }
      .score {
        font-size: 36px;
        width: 70px;
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
    
             
    // si el nombre es null se saca los input para meter la puntuación
    //la posición se pone sola con el order by de la consulta
    ?>

    <br><br>
    <?php
    for ($i=0; $i < 10 ; $i++) {
      if($nom[$i]["NOMBRE"] != null || isset($_POST['guardarPuntos'])){
        echo '
        <br><br>
        <div class="rank">'.$i.'.</div>
        <p type="text" class="player-input" maxlength="1"> ' . $nom[$i]["NOMBRE"] . ' </p>
        <div class="score">' . $nom[$i]["PUNTOS"] . '</div>
        ';
      }else{
        echo '
        <br><br>
        <div class="rank">'.$i.'.</div>
        <input type="text" class="player-input" name="char1" maxlength="1">  
        <input type="text" class="player-input" name="char2" maxlength="1">  
        <input type="text" class="player-input" name="char3" maxlength="1">  
        <div class="score">' . $nom[$i]["PUNTOS"] . '</div>
        ';
      }
    }
    ?>


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