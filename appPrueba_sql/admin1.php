<?php
session_start();
require_once("header.php");
require("dbutils.php");
$conexion  = conectarDB();
$usuarios = execute_query($conexion, "SELECT * FROM usuarios");
if(isset($_POST["nombres"])){
  var_export($_POST["nombres"]);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin 1</title>
    <meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 


    <script>
      $(document).ready(function () {
      $('#miTabla').DataTable();
    });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="margin-top:20px">
      <a href="logout.php">Cerrar sesión </a>
      <form method="POST">
        <table id="miTabla" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Clave</th>
            </tr>
        </thead>
        </tbody>
        <tfoot>
            <tr>        
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Clave</th>
            </tr>
        </tfoot>
          <?php
          
            foreach($usuarios as $usuario){
              echo "<tr>";
                echo "<td>". $usuario["usuario"] ."</td>";
                echo "<td><input type='text' name='nombres[]' value='". $usuario["nombre"] ."'/></td>";
                echo "<td>". $clave["clave"] ."</td>";
                echo "<td><input type='text' name='claves[]' value='". $usuario["clave"] ."'/></td>";
                echo "</tr>";
            }
          
          ?>
          </tbody>
        </table>
        <button class="btn btn-primary">
          Actualizar
        </button>
      </form>
    </div>
  </body>
</html>