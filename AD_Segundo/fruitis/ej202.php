
<!DOCTYPE html>
<html lang="en">
    <form action="">
<head>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 40px;
        }
        
        .td{
            padding: 20%;
        }

        .Tabla{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 60px;
            margin-bottom: 20px;
            margin-top: 20px;
            margin-right: 20px;
            margin-left: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            text-align: center;
            box-shadow: 0 1px 1px rgba(0,0,0,0);
            display: inline-block;
            vertical-align: top;
            background-color: #eee;
            background-repeat: no-repeat;
            background-position: center;
            background-image: none;
        }
         
       .Tabla:hover{
            background-color: #ccc;
            box-shadow: 0 1px 1px rgba(0,0,0,0);
       }
       </style>
       
       <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <br>
    <?php
    $bool = false;
    if ($_POST['tamano'] == "" && $_POST['color'] == ""){
        $bool = true;
    }
require_once("dbutils.php");
$db = conectarDB();
//var_export($_POST);
//Export $_POST 
$qr = $_POST['tamano'];
$cl = $_POST['color'];
$hort = getAllHortalizasFromTamAndColor($db,$qr,$cl,$bool);
echo "\n"."La hortaliza es: ". $hort[0]["NOMBRE"];
?>

<table border="1" class="Tabla">
    
    <tr>
        <td>NOMBRE</td>
        <td>COLOR</td>
        <td>TAMAÑO</td>
    </tr>

    <?php
    for ($i=0; $i < count($hort); $i++) { 
        echo "<tr>";
        echo "<td>".$hort[$i]['TAM']."</td>";
        echo "<td>". $hort[$i]['COLOR']."</td>";
        echo "<td>". $hort[$i]['NOMBRE']."</td>";
        echo "</tr>";
        } 
    ?>

</table>
  
</body>
</form>
</html>