
<!DOCTYPE html>
<html lang="en">
    <form action="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <br>
    <?php
require_once("dbutils.php");
$db = conectarDB();
    var_export($_POST);
//Export $_POST 
$qr = $_POST['tamano'];
var_export($qr);
$hort = getHortalizaFromTam($db,$qr);
var_export($hort);
echo "\n"."La hortaliza es: ". $hort["NOMBRE"];
?>
  
</body>
</form>
</html>