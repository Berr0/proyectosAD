<?php

if(isset($POST_["usuario"]) && $_POST["password"]){
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["password"];
    $loginCorrecto = false;
    $conect = conectarDB();
    $filas = getUsuariosPassword($conect, $usuario,md5($contraseña));
    if ($filas&&$contraseña == "4d186321c1a7f0f354b297e8914ab240") {
        header("Location: admin.php");
        $loginCorrecto = true;
        exit();
    }   
}

if($loginCorrecto){

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
    crossorigin="anonymous"
  />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>  
        <div class="container">
            <form method="post">
                <input type="text" class="form-control" name="usuario" placeholder="Introduce un nombre: " required>
                <br>
                <input type="password" class="form-control" name="password" placeholder="Introduce una contraseña: " required>
                <br>
                <button class="btn btn-primary">login</button>
        <?php
        if(isset($POST_["usuario"]) && $_POST["password"] && $loginCorrecto){
            echo "<div class=\"alert alert-success\" role=\"alert\">Congratulations! You are now logged in.</div>";
        }
        
        ?>
            </form>
            
        </div>

     
</body>
</html>