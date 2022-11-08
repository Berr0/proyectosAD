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

</head>
<body>




</body>

</html>