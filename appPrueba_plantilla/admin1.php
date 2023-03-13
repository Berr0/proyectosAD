<?php
session_start();
require("dbutils.php");
require_once("header.php");
require_once("phpUtils.php");


$conexion  = conectarDB();

// var_export($_POST);
$accionActualizar = 0;
$accionBorrar = 0;
$accionActualizarCheckeados = 0;
// If que revisa el estado en el post de los botones y revisa el estado de los arrays de usuarios, si el usuario tiene el checkbox seleccionado pasa el accionX a 2. Que simboliza la ejecución correcta
if (isset($_POST['bActualizar']))
{
  $accionActualizar = 3;
  foreach ($_POST["usuarios"] as $usuI => $aNombreClave)
  {
    
      $accionActualizar=1;
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

else if (isset($_POST['bActualizaciones']))
{
    $accionActualizarCheckeados=3;
    foreach ($_POST["usuarios"] as $usuI => $aNombreClave)
    {
      if (isset($aNombreClave[2]))
      {
        $accionActualizarCheckeados=1;
        try
        {
      execute_query($conexion, "UPDATE usuarios SET nombre=:NOMBRE,clave=:CLAVE WHERE usuario=:USUARIO",
                 array(":USUARIO" => $usuI, ":NOMBRE" => $aNombreClave[0], ":CLAVE" =>$aNombreClave[1]),"PDO::FETCH_ASSOC",false);
        }
        catch (Exception $e)
        {
          $accionActualizarCheckeados=2;
          echo "ERROR: ".$e->getMessage();
        }
      }
    }  
}

// Sacamos los usuarios de la base de datos para recorrerlos y meterlos en la tabla
$usuarios = execute_query($conexion, "SELECT * FROM usuarios");


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin1</title>
    <meta charset="UTF-8">
    

  <!-- Scripts de bootstrap para funcionalidad de la tabla-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Este script lo ejecutamos cuando en el body como primer trozo de codigo a ejecutar-->
    <script>
       //Esto es parte del bootstrap, tienes que meter entre las comillas el id de la tabla
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
        
         else if ($accionActualizarCheckeados==1)
        {
          echo "Swal.fire('Enhorabuena!','Se han actualizado los seleccionados correctamente!','success');";  
        }
        else if ($accionActualizarCheckeados==2)
        {
          echo "Swal.fire('ERROR!','No se han actualizado los seleccionados','error');";  
        }
        else if ($accionActualizarCheckeados==3)
        {
          echo "Swal.fire('CUIDADO!','Por favor selecciona algo para actualizar','warning');";  
        }
        
        ?>        
      }
      
    </script>
    

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css" >

  </head>
  <body onload="init()">
    <div class="container">
      <div class="row">
        <div class="col-8">
          
        </div>
        <div class="col-4">
          <div>
      <div class="alert alert-<?php echo obtenerColor(); ?> alert-dismissible fade show" role="alert">
        <strong>Usuario logeado: <?php echo $_SESSION["userApp"]; ?><span class="float-end"><a href="logout.php">Cerrar sesión </a></span></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>    
    </div>
        </div>
      </div>
      <form method="POST">
    <table id="miTabla" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Borrar / Actualizar</th>
            </tr>
        </thead>
        <tbody>
          <?php
          
            foreach($usuarios as $usuario){
              echo "<tr>";
                $user = $usuario["usuario"] ;
                echo "<td>".$user ."</td>";
                //Introducimos en el post con el name un array que contiene el nombre del usuario
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
                <th>Borrar / Actualizar </th>

            </tr>
        </tfoot>
        </table>
         <button name="bActualizaciones" class="btn btn-warning">
          Actualizar Seleccionados
        </button>
        <button name="bActualizar" class="btn btn-primary">
          Actualizar+IVA
        </button>
        <button name="bBorrar" class="btn btn-danger">
          Borrar
        </button>
        <a name="bAdmin2" href="admin2.php" class="btn btn-success">Admin2</a>

      </form>
    </div>
  </body>
</html>
