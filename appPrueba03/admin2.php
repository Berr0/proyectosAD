<?php
session_start();
require("dbutils.php");
require_once("header.php");


$conexion  = conectarDB();

//var_export($_POST);
$accionActualizar = 0;
$accionBorrar = 0;
if (isset($_POST['bActualizar']))
{
  $accionActualizar = 1;
  foreach ($_POST["usuarios"] as $usuI => $aNombreClave)
  {
    try
    {
      execute_query($conexion, "UPDATE usuarios SET nombre=:NOMBRE,clave=:CLAVE WHERE usuario=:USUARIO",
                 array(":USUARIO" => $usuI, ":NOMBRE" => $aNombreClave[0], ":CLAVE" =>$aNombreClave[1]),"PDO::FETCH_ASSOC",false);
    }
    catch (Exception $e)
    {
      $accionActualizar = 2;
    }
    }
}
else if (isset($_POST['bBorrar']))
{
    $accionBorrar=3;
    foreach ($_POST["usuarios"] as $usuI => $aNombreClave)
    {
      if (isset($aNombreClave[2]))
      {
        $accionBorrar=1;
        try
        {
          execute_query($conexion, "DELETE from usuarios WHERE usuario=:USUARIO",
                 array(":USUARIO" => $usuI),"PDO::FETCH_ASSOC",false);
        }
        catch (Exception $e)
        {
          $accionBorrar=2;
        }
      }
    }  
}

$usuarios = execute_query($conexion, "SELECT * FROM usuarios");


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin2</title>
    <meta charset="UTF-8">
    


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function () {$('#miTabla').DataTable();});
      
      function init()
      {
        
        <?php
        if ($accionActualizar==1)
        {
          echo "Swal.fire('Enhorabuena!','Se ha actualizado correctamente!','success');";  
        }
        else if ($accionActualizar==2)
        {
          echo "Swal.fire('ERROR!','No se ha actualizado correctamente','error');";  
        }
        else if ($accionBorrar==1)
        {
          echo "Swal.fire('Enhorabuena!','Se ha borrado correctamente!','success');";  
        }
        else if ($accionBorrar==2)
        {
          echo "Swal.fire('ERROR!','No se ha borrado correctamente','error');";  
        }
        else if ($accionBorrar==3)
        {
          echo "Swal.fire('CUIDADO!','Por favor selecciona algo para borrar','warning');";  
        }
        
        ?>
        
        
        
        
      }
      
    </script>
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css" >

  </head>
  <body onload="init()">
    <div class="container" style="margin-top:20px">
      <a href="logout.php">Cerrar sesión </a>
      <form method="POST">
    <table id="miTabla" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
          <?php
          
            foreach($usuarios as $usuario){
              echo "<tr>";
                $user = $usuario["usuario"] ;
                echo "<td>".$user ."</td>";
                echo "<td><input type='text' name='usuarios[$user][]' value='". $usuario["nombre"] ."'/></td>";
                echo "<td><input type='text' name='usuarios[$user][]' value='". $usuario["clave"] ."'/></td>";
                echo "<td><input type='checkbox' name='usuarios[$user][]'/></td>";
              echo "</tr>";
            }
          
          ?>
          </tbody>
        <tfoot>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Borrar</th>

            </tr>
        </tfoot>
        </table>
        <button name="bActualizar" class="btn btn-primary">
          Actualizar
        </button>
        <button name="bBorrar" class="btn btn-danger">
          Borrar
        </button>
        <a name="bAdmin1" href="admin1.php" class="btn btn-success">Admin1</a>
      </form>
    </div>
  </body>
</html>
