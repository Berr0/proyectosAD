<html>
  <head>
    
  </head>
  <body>
    <?php
      require_once("dbutils.php");
      if(isset($_POST["t"]))var_export(getAllHortalizasFromTam2(conectarDB(), $_POST["t"]));
    ?>
    <form method="POST" action="iny.php">
      <input type="text" name="t"/>
    </form>
  </body>
</html>