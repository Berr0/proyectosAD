<?php
    //Se crea el mazo como un array de numeros, que representan las cartas, ya que cada carta se llama como un número
    $Mazo = array (1,2,3,4,5,6,8,9,10,11,12,13,14,15);
    $Mano = array ();
    $Mano[] = 3;
    iniciarMano();

    function iniciarMano(){
        global $Mano;
    }



    
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
<body>
<div id="title">
    <h1>Timeline</h1>
    <h2>
        <button id="newgame">New Game</button>
        <button id="help">Help</button>
    </h2>
</div>
<div id="table">


<section class="main-carousel">
	<button class="button-arrow -left" title="Clique para voltar">
		<span class="content">Voltar</span>
	</button>

	<div class="items">
		<div class="cards">
			<article class="node-card">
				<h2 class="main-title -second">2012</h2>
				<div class="logo" >
					<img src="https://i.ibb.co/G2rg5jQ/logo-locaweb.png" id="celda" alt="Logo da Locaweb">
				</div>
			</article>

			<article class="node-card">
				<h2 class="main-title -second">2014</h2>
				<div class="logo -no-padding">
					<img class="image" src="https://i.ibb.co/ByHFYcf/logo-caelum.png" alt="Logo da Caelum">
				</div>
			</article>

			<article class="node-card">
				<h2 class="main-title -second">2016</h2>
				<div class="logo -bg-red">
					<img src="https://i.ibb.co/nRCkymQ/logo-getninjas.png" alt="Logo da GetNinjas">
				</div>
			</article>

			<article class="node-card">
				<h2 class="main-title -second">2017</h2>
				<div class="logo -no-padding">
					<img class="image" src="https://i.ibb.co/ByHFYcf/logo-caelum.png" alt="Logo da Caelum">
				</div>
			</article>

			<article class="node-card">
				<h2 class="main-title -second">2018</h2>
				<div class="logo">
					<img src="https://i.ibb.co/FBxTkK1/logo-impulso.png" alt="Logo da Impulso">
				</div>
			</article>

			<article class="node-card">
				<h2 class="main-title -second">2019</h2>
				<div class="logo -bg-red">
					<img src="https://i.ibb.co/XSmBYKm/logo-collabcode.png" alt="Logo da CollabCode">
				</div>
			</article>
		</div>
	</div>

	<button class="button-arrow -right" title="Clique para avançar">
		<span class="content">Avançar</span>
	</button>
</section>
    <div id="posTable">
    <div id="free0" class="free"></div>
    <div id="free1" class="free"></div>
    <div id="free2" class="free"></div>
    <div id="free3" class="free"></div>
    <div id="free4" class="free"></div>
    <div id="free5" class="free"></div>
    <div id="free6" class="free"></div>
    <div id="free7" class="free"></div>
<div class="columnMom">
<div id="col0" class="column1"></div>
    <div id="col1" class="column2"></div>
    <div id="col2" class="column3"></div>
    <div id="col3" class="column4"></div>
    <div id="col4" class="column5"></div>
    <div id="col5" class="column6"></div>
    <div id="col6" class="column7"></div>
    <div id="col7" class="column8"></div>
</div>
    </div>
    
</div>

<div id="footer">
  
</div>

<div id="windialog">
<p>Well done, you have won!</p>
</div>

<div id="helptext">
<p>
FreeCell is a solitaire-based card game played with a 52-card standard deck.
It is fundamentally different from most solitaire games in that nearly all
deals can be solved.
</p>
<p>Construction and layout:</p>
<ul>
    <li>One standard 52-card deck is used.</li>
    <li>There are four open cells and four open foundations. Some alternate
    rules use between one to ten cells.</li>
    <li>Cards are dealt into eight cascades, four of which comprise seven cards
    and four of which comprise six. Some alternate rules will use between four to ten cascades.</li>
</ul>
<p>Building during play:</p>
<ul>
    <li>The top card of each cascade begins a tableau.</li>
    <li>Tableaux must be built down by alternating colors.</li>
    <li>Foundations are built up by suit.</li>
</ul>
<p>Moves:</p>
<ul>
    <li>Any cell card or top card of any cascade may be moved to build on a
    tableau, or moved to an empty cell, an empty cascade, or its foundation.</li>
    <li>Complete or partial tableaus may be moved to build on existing tableaus,
    or moved to empty cascades, by recursively placing and removing cards
    through intermediate locations. While computer implementations often show
    this motion, players using physical decks typically move the tableau at
    once.</li>
</ul>
<p>Victory:</p>
<ul>
    <li>The game is won after all cards are moved to their foundation piles.</li>
</ul>
<p>Rules from <a href="http://en.wikipedia.org/wiki/Freecell">Wikipedia.</a>
</p>
</div>


</body>

<script src="timelineGUI.js" type="text/javascript"></script>
<script src="script.js" type="text/javascript"></script>


        
</html>