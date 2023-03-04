<?php

require_once("dbutils.php")

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="margin-top:20px">
      <form method="POST">
      <button class="btn btn-primary">Admin 2</button>
</form>
      <form method="POST">
      <button class="btn btn-primary">Log out</button>
        <?php
            if(isset($_POST["password"])) echo "<p>Contraseña incorrecta</p>"; 
  ?>
    </form>
    </div>
  </body>
</html>

