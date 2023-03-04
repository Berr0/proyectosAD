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
    
      
    
      //modificarHortalizaFromTamAndColor($conDB, $size,$color,$nombre);
       $idInsertado = insertarHortaliza($conDB,$nombre,$color,$size); 
        var_export($idInsertado);
    
        if($idInsertado == 0){
          echo '<script>alert("NO SE HA PODIDO INSERTAR");
          location.href="pagina1in.php"</script>';  
        }
    
    $numBorradas = borrarHortaliza($conDB,4);
 
            
          echo '<script>alert("LAS Borradas son '.$numBorradas.'"); </script>';  
        

    
      $resultados = getAllHortalizasFromTamColor($conDB, "", "");
    
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