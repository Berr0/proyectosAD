<html>
  <head>
    <title>Resultado</title>
  </head>
  <body>
    <?php
    
      if(!isset($_POST["numero1"]) || !isset($_POST["numero2"]) || !isset($_POST["operacion"])){
        echo "<p>Faltan valores...</p></body></html>";
        return;
      }
    
      //Capturar valores
      $numero1 = $_POST["numero1"];
      $numero2 = $_POST["numero2"];
      $operacion = $_POST["operacion"];    
       
      //Verificar si la operacion es correcta
      if($operacion != "sumar" && $operacion != "restar" && $operacion != "dividir" && $operacion != "multiplicar"){
        echo "<p>La operación no es válida</p></body></html>";
        return;
      }
    
      //Realizar operación
      $resultado = 0;
      if($operacion == "sumar") $resultado = $numero1 + $numero2;
      else if($operacion == "restar") $resultado = $numero1 - $numero2;
      else if($operacion == "dividir") $resultado = $numero1 / $numero2;
      else if($operacion == "multiplicar") $resultado = $numero1 * $numero2;
    
      //Mostrar resultado
      echo "<p><b>Resultado de $operacion $numero1 y $numero2:</b> $resultado</p>";
    ?>
  </body>
</html>