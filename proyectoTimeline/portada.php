<html>
<head>
<title>
TimeLine
</title>
<style>
    HTML CSSResult Skip Results Iframe
EDIT ON
.responsive-banner {
  margin: 80px auto;
  width: 40%;
  min-width: 230px;
  max-width: 330px;
  position: relative;
  height: auto;
  min-height: 300px;
  max-height: 500px;
  border-radius: 10px;
  overflow: hidden;
  background-image: linear-gradient(to bottom right, #D45BA1, #A784E0);
  background-repeat: no-repeat;
  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
}
.container-envelope {
  margin: auto;
  width: 50%;
  border: 3px;
  padding: 10px;
  width: 300px;
  color: #fff;
  display: flex;
}
.col-xs-12 {
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 100%;
  -ms-flex: 0 0 100%;
  flex: 0 0 100%;
  max-width: 100%;
  -webkit-align-self: center;
  -ms-flex-item-align: center;
  align-self: center;
  text-align: center;
}

img {
  max-width : 330px;
  width: 100%;
  position: relative;
}
span:after,
span:before {
  content: "";
  position: absolute;
  display: block;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.1);
  width: 50px;
  height: 50px;
}
.circle-a:before {
  width: 500px;
  height: 500px;
  top: -300px; left: 52%;
  -webkit-transform: translate(-50%,0);
  -ms-transform: translate(-50%,0);
  transform: translate(-50%,0);
}
.circle-a:after {
  top: 160px;
  right: 10%;
}
.circle-b:before {
  top: 60%;
  left: -25px;
}
.circle-b:after {
  width: 150px;
  height: 150px;
  bottom: -70px;
  right: -70px;
}

/* Demo Stuff */
p {
  clear: both;
  font-family: 'Work Sans', Helvetica, sans-serif;
  text-transform: none;
  text-rendering: optimizeLegibility;
  font-weight: 500;
  line-height: 1.15;
  word-wrap: break-word;
  margin: 1em 0 0.5em;
  margin: 0;
  padding: 0;
  color: #fff;
  position: relative;
  word-wrap: break-word;
  font-size: 20px;
  text-transform: uppercase;
  margin-bottom: 20px;
}
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
a.more-link {
  background-color: rgba(255, 255, 255, 0.35);
  display: inline-block;
  padding: 12px 18px;
  color: #fff;
  text-decoration: none;
  font: 500 15px 'Work Sans', Helvetica, sans-serif;
  line-height: 1.5;
  text-align: center;
  border: none !important;
  position: relative;
  border-radius: 30px;
  text-transform: uppercase;
  -webkit-transition: .1s all ease-in-out;
  -moz-transition: .1s all ease-in-out;
  -o-transition: .1s all ease-in-out;
  transition: .1s all ease-in-out;
}
a.more-link:hover {
  background-color: rgba(255, 255, 255, 0.50);
}
body {
  background-color: #eff2f7;
  margin-bottom: 50px;
}
html, button, input, select, textarea {
  font-family: 'Source Sans Pro', Helvetica, sans-serif;
  color: #90b0bf;
}
h1 {
  text-align: center;
  margin: 30px 15px;
}
.link-container {
  text-align: center;
}
.link-container a.more-link {
  font-family: 'Source Sans Pro', Helvetica, sans-serif;
  background-color: #90b0bf;
  color: #fff;
  display: inline-block;
  margin-right: 5px;
  margin-bottom: 5px;
  line-height: 1.5;
  text-decoration: none;
  text-transform: none;
  font-weight: 400;
  letter-spacing: 1px;
}
</style>
</head>
<body>
<h1> TIME LINE </h1>
<aside class="responsive-banner">
	<span class="circle-a"></span>
	<span class="circle-b"></span>
	<div class="container-envelope">
		<p>Introduzca su Nombre</p>
    
	</div>
  <br>
  <form method="post" action="juego.php">
<center>  <input type="text" name="nombre"></center>

<?php
$name = $_POST['nombre']; 
?>
<br>
 <center> <input type="submit"></center>


 </form>
</aside>


</body>

</html>