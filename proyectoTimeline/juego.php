<html>

<?php
    var_export($_POST);
    //Se crea el mazo como un array de numeros, que representan las cartas, ya que cada carta se llama como un número
    $Mazo = array (1,2,3,4,5,6,8,9,10,11,12,13,14,15);
    $Mano = array ();
    $Mano[] = 3;
    iniciarMano();

    function iniciarMano(){
        global $Mano;
        var_export($Mano);
    }



    
?>

<head>
<title>  Timeline </title>
<style>

</style>

<link rel="stylesheet" href="proyectoTimeline\style\styles.css">
<link rel="stylesheet" type="text/css" href="../../files/paf.css" />
<link rel="stylesheet" type="text/css" href="style/styles.css" />
<link rel="stylesheet" type="text/css" href="style/jquery-ui.min.css" />
    
<script src="proyectoTimeline\script.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js" type="text/javascript"></script>
   
</head>
<body>

<div id="title">
    <h1>Fre<span id="secret">e</span>cell</h1>
    <h2>
        <button id="newgame">New Game</button>
        <button id="help">Help</button>
    </h2>
</div>
<div id="table">
    <div id="free0" class="free"></div>
    <div id="free1" class="free"></div>
    <div id="free2" class="free"></div>
    <div id="free3" class="free"></div>

    <div id="suit0" class="suit"></div>
    <div id="suit1" class="suit"></div>
    <div id="suit2" class="suit"></div>
    <div id="suit3" class="suit"></div>

    <div id="col0" class="column"></div>
    <div id="col1" class="column"></div>
    <div id="col2" class="column"></div>
    <div id="col3" class="column"></div>
    <div id="col4" class="column"></div>
    <div id="col5" class="column"></div>
    <div id="col6" class="column"></div>
    <div id="col7" class="column"></div>
</div>

<div id="footer">
  
</div>

<div id="windialog">
<p>Well done, you have won!</p>
</div>

<div id="helptext">

<ul>
    <li>The game is won after all cards are moved to their foundation piles.</li>
</ul>
<p>Rules from <a href="http://en.wikipedia.org/wiki/Freecell">Wikipedia.</a>
</p>
</div>

         

</body>

</html>