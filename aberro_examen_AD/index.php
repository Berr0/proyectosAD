<!DOCTYPE html>
<html lang="en">
<head>
<?php
        require_once("./BBDD/dbutils.php");
        $db = conectarDB();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index2.php">
    <h1>Examen NavaPark</h1>

    <?php
         $atracciones = getAllAtracciones($db);
         $total = count($atracciones[0]);
        //  for ($i = 0; $i < $total; $i++) {
        //      echo '<p">'. $atracciones[0][$i]["NOMBRE"]. '</p>';
        //  }
        ?>
        <center><h2>Atracciones y Viajes</h2></center>

        <!--Table that contains php isles and 3 different columns-->
        <table border="1" width="100%" cellspacing="0" cellpadding="0">
            <!--table column-->
            <tr>
                <td>NOMBRE</td>
                <td>FECHA</td>
                <td>EDAD</td>
        </tr>       
             
               <?php

               for ($i = 0; $i < $total; $i++) {
                $viaje = getViajeFromAtraccion($db, $atracciones[0][$i]["NOMBRE"]);
                $totalviajes = count($viaje[0]);
                   if ($totalviajes > 1) {
                       for ($j = 0; $j < $totalviajes; $j++) {
                           echo '<tr>
                    <td>' . $atracciones[0][$j]["NOMBRE"] . '</td>
                    <td>' . $viaje[0][$j]["FECHA"] . '</td>
                    <td>' . $viaje[0][$j]["EDAD"] . '</td>
                    </tr>';
                       }
                   }
                echo "<tr>";
                echo "<td>" . $atracciones[0][$i]["NOMBRE"] . "</td>";
                echo "<td>" . $viaje[0][0]["FECHA"]. "</td>";
                echo "<td>" . $viaje[0][0]["EDAD"] . "</td>";
                echo "</tr>";
              
               }
               
                ?>
            
    
    <!-- 
        Base de datos:
            - Tabla atracciones (un nombre, viajes, atraccion)
            - Tabla viaje(un viajero, la atraccion y una hora)
            - Tabla viajeros (un viajero, edad)

            TODAS LAS ATRACCIONES DEL PARQUE CON TODOS LOS VIAJES CON TODAS LAS HORA Y LA EDAD DE LA PERSONA
    -->



    </form>
</body>
</html>