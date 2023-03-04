<html>
  <head>   
  </head>
  <body>
    <?php
      require_once("dbutils.php");
      var_export($_POST);
      $size = $_POST["size"];
      $color = $_POST["color"];
      $nombre = $_POST["nombre"];
      $conDB = conectarDB();
    
      modificarHortalizaFromTamAndColor($conDB, $size,$color,$nombre);
    
      $resultados = getAllHortalizasFromTamColor($conDB, $size, $color);
    
     ?>
    <table border="2px">
      <tr><th>Nombre</th><th>Tamaño</th><th>Color</th></tr>
      <?php
        foreach ($resultados as $fila){
          echo "<tr><td>".$fila["NOMBRE"]."</td><td>".$fila["TAM"]."</td><td>".$fila["COLOR"]."</td></tr>" ;
        }
      ?>
    </table>
  </body>
</html>