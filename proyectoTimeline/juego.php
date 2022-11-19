<?php
    //Se crea el mazo como un array de numeros, que representan las cartas, ya que cada carta se llama como un número
    $Mazo = array (1,2,3,4,5,6,8,9,10,11,12,13,14,15);
    $Mano = array ();
    $Mano[] = 3;
    iniciarMano();

    function iniciarMano(){
        global $Mano;
    }

    // $Nombre=$_POST['nombre'];
    // echo '<div id="divNombre">
    // <p id="Nombre">Sesión abierta de "'.$Nombre.'"
    // </div>';
    

    //echo var_export($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../../files/paf.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js" type="text/javascript"></script>
    <title>Timeline</title>
</head>
<body id="Interface">
<div id="title">
    <h1>Timeline</h1>
    <h2>
        <button id="newgame">New Game</button>
        <button id="help">Help</button>
    </h2>
</div>
<div id="table">
<section class="main-carousel">
	<button class="button-arrow -left" title="Haga click para volver">
		<span class="content">Voltar</span>
	</button>
	<div class="items">
		<div class="cards">
		<?php
		$year = [1492,1789,1914,1936,1939,1945,1969,1989,1990,2001];
		for ($i=0; $i < count($year); $i++) { 
	echo '<article class="node-card ">';
	echo '<h2 class="main-title -second">'.$year[$i].'</h2>';
	echo '<div class="logo '.$year[$i].'" id="'.$year[$i].'" >';
    # en el id de img, metemos esto: '.$year[$i].' para que se compare con la carta introducida
	echo '<img id="celda'.$year[$i].'" alt="Carta a introducir">';
	echo '</div>';
	echo '</article>';
		}
		function enableHidden($index)
		{
			if($index % 2==0)
			return "hidden";
		}
	?>
		</div>
	</div>
	<button class="button-arrow -right" title="Haga click para avanzar">
		<span class="content">Avanzar</span>
	</button>
</section>
<div id="posTable">
<?php
    # Generar frees con id igual al año, implementar cuando haya cartas 
		$year = [1492,1789,1914,1936,1939,1945,1969,1989,1990,2001];
		for ($i=0; $i < 5; $i++) {
       echo' <div class="FreeBox">';
       echo' <div id="free'.$i.'" class="freeHide free"></div>';
       echo' </div>';
        };

       echo' <div class="FreeBox">';
       echo '<div id="free5" class="free"></div>';
       echo' </div>';

        for ($i=6; $i < 10; $i++) {
       echo' <div class="FreeBox">';
       echo' <div id="free'.$i.'" class="freeHide free"></div>';
       echo' </div>';
         };
         ?>

    </div>
    <div class="columnMom">
	<div id="col0" class="column1"></div>
    <div id="col1" class="column2"></div>
    <div id="col2" class="column3"></div>
    <div id="col3" class="column4"></div>
</div>
</div>
<div id="footer">
</div>
<div id="windialog">
<p>Bien hecho! Ganaste! </p>
</div>
<div id="helptext">
<p>Rules from <a href="http://en.wikipedia.org/wiki/Mondongo">Wikipedia.</a>
</p>
</div>
</body>
<script src="timelineGUI.js" type="text/javascript"></script>
<script src="script.js" type="text/javascript"></script> 
</html>