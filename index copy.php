<?php
// Conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bbdd_barcos";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// HTML para referenciar estilo css
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcofacts</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script defer src=script.js></script>
</head>

<body>
    <div class="logo-container">
        <div class="logo-bar"></div>
        <img src="logo-barcos.png" alt="Logo de Barcofacts" class="logo">
    </div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="button-container">
            <button type="button" onclick="scrollToConsulta('consulta1')">Consulta 1</button>
            <button type="button" onclick="scrollToConsulta('consulta2')">Consulta 2</button>
            <button type="button" onclick="scrollToConsulta('consulta3')">Consulta 3</button>
            <button type="button" onclick="scrollToConsulta('consulta4')">Consulta 4</button>
            <button type="button" onclick="scrollToConsulta('consulta5')">Consulta 5</button>
        </div>
    </form>

    <div class="consultas-container">
        <div id="consulta1">
            <?php
              $query1 = "SELECT bc.NOMBRE_BARCO, cc.NRO_CANIONES, cc.DESPLAZAMIENTO
              FROM BARCO_CLASE bc
              JOIN CLASES cc ON bc.CLASE = cc.CLASE
              JOIN RESULTADOS r ON bc.NOMBRE_BARCO = r.NOMBRE_BARCO
              WHERE r.NOMBRE_BATALLA = 'Guadalcanal'";
              
              
                          $resultado1 = $conexion->query($query1);
              
                          echo "<h2>Consulta 1: Barcos en la batalla de Guadalcanal</h2>";
                          echo "<div class='tabla'>";
                          echo "<table>";
                          echo "<tr><th>Nombre del Barco</th><th>Cañones</th><th>Desplazamiento</th></tr>";
                          while ($fila = $resultado1->fetch_assoc()) {
                              echo "<tr><td>" . $fila["NOMBRE_BARCO"] . "</td><td>" . $fila["NRO_CANIONES"] . "</td><td>" . $fila["DESPLAZAMIENTO"] . "</td></tr>";
                          }
                          echo "</table>";
                          echo "</div>";
                          $scrollTo = 'consulta1'; // Id del div de la consulta 1
            ?>
        </div>
        <div id="consulta2">
            <?php
            // Resultado de la consulta 2
            ?>
        </div>
        <div id="consulta3">
            <?php
            // Resultado de la consulta 3
            ?>
        </div>
        <div id="consulta4">
            <?php
            // Resultado de la consulta 4
            ?>
        </div>
        <div id="consulta5">
            <?php
            // Resultado de la consulta 5
            ?>
        </div>
    </div>

    <?php

    // CONSULTAS CON BOTONES
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["consulta1"])) {
            /* 
    Consulta 1
    -----------------------------------------------------
    Listar el nombre del barco, desplazamiento y cantidad de cañones,
    de los barcos que participaron en la batalla de Guadalcanal.
*/
            $query1 = "SELECT bc.NOMBRE_BARCO, cc.NRO_CANIONES, cc.DESPLAZAMIENTO
FROM BARCO_CLASE bc
JOIN CLASES cc ON bc.CLASE = cc.CLASE
JOIN RESULTADOS r ON bc.NOMBRE_BARCO = r.NOMBRE_BARCO
WHERE r.NOMBRE_BATALLA = 'Guadalcanal'";


            $resultado1 = $conexion->query($query1);

            echo "<h2>Consulta 1: Barcos en la batalla de Guadalcanal</h2>";
            echo "<div class='tabla'>";
            echo "<table>";
            echo "<tr><th>Nombre del Barco</th><th>Cañones</th><th>Desplazamiento</th></tr>";
            while ($fila = $resultado1->fetch_assoc()) {
                echo "<tr><td>" . $fila["NOMBRE_BARCO"] . "</td><td>" . $fila["NRO_CANIONES"] . "</td><td>" . $fila["DESPLAZAMIENTO"] . "</td></tr>";
            }
            echo "</table>";
            echo "</div>";
            $scrollTo = 'consulta1'; // Id del div de la consulta 1
        } elseif (isset($_POST["consulta2"])) {
            /* 
    Consulta 2
    -----------------------------------------------------
    Encontrar aquellos países que dispongan tanto de acorazados como de cruceros.
*/
            $query2 = "SELECT DISTINCT PAIS
FROM CLASES
WHERE TIPO IN ('acorazado', 'crucero')
GROUP BY PAIS
HAVING COUNT(DISTINCT TIPO) = 2";
            $resultado2 = $conexion->query($query2);

            echo "<h2>Consulta 2: Países con acorazados y cruceros</h2>";
            echo "<div class='tabla'>";
            echo "<table>";
            echo "<tr><th>País</th></tr>";
            while ($fila = $resultado2->fetch_assoc()) {
                echo "<tr><td>" . $fila["PAIS"] . "</td></tr>";
            }
            echo "</table>";
            echo "</div>";
            $scrollTo = 'consulta2'; // Id del div de la consulta 1
        } elseif (isset($_POST["consulta3"])) {
            /* 
    Consulta 3
    -----------------------------------------------------
    Encontrar aquellos países que dispongan tanto de acorazados como de cruceros.
*/
            $query3 = "SELECT DISTINCT r.NOMBRE_BATALLA, c.PAIS, COUNT(DISTINCT r.NOMBRE_BARCO) AS Cantidad_Barcos
    FROM RESULTADOS r
    JOIN BARCO_CLASE bc ON r.NOMBRE_BARCO = bc.NOMBRE_BARCO
    JOIN CLASES c ON bc.CLASE = c.CLASE
    WHERE c.PAIS IN (
        SELECT DISTINCT PAIS
        FROM CLASES
        WHERE TIPO IN ('acorazado', 'crucero')
        GROUP BY PAIS
        HAVING COUNT(DISTINCT TIPO) = 2
    )
    GROUP BY r.NOMBRE_BATALLA, c.PAIS
    HAVING COUNT(DISTINCT r.NOMBRE_BARCO) >= 3";
            $resultado3 = $conexion->query($query3);

            echo "<h2>Consulta 3: Batallas con al menos tres barcos de un mismo país</h2>";
            echo "<div class='tabla'>";
            echo "<table>";
            echo "<tr><th>Batalla</th><th>País</th><th>Cantidad de Barcos</th></tr>";
            while ($fila = $resultado3->fetch_assoc()) {
                echo "<tr><td>" . $fila["NOMBRE_BATALLA"] . "</td><td>" . $fila["PAIS"] . "</td><td>" . $fila["Cantidad_Barcos"] . "</td></tr>";
            }
            echo "</table>";
            echo "</div>";
            $scrollTo = 'consulta3'; // Id del div de la consulta 1
        } elseif (isset($_POST["consulta4"])) {
            /* 
    Consulta 4
    -----------------------------------------------------
    Encontrar aquellos países que dispongan tanto de acorazados como de cruceros.
*/

            $query4 = "SELECT cc.PAIS, MAX(cc.NRO_CANIONES) AS Max_Cañones
    FROM CLASES cc
    JOIN BARCO_CLASE bc ON cc.CLASE = bc.CLASE
    JOIN BARCOS b ON bc.NOMBRE_BARCO = b.NOMBRE_BARCO
    GROUP BY cc.PAIS";

            $resultado4 = $conexion->query($query4);

            echo "<h2>Consulta 4: Países con mayor número de cañones</h2>";
            echo "<div class='tabla'>";
            echo "<table>";
            echo "<tr><th>País</th><th>Máximo de Cañones</th></tr>";
            while ($fila = $resultado4->fetch_assoc()) {
                echo "<tr><td>" . $fila["PAIS"] . "</td><td>" . $fila["Max_Cañones"] . "</td></tr>";
            }
            echo "</table>";
            echo "</div>";
            $scrollTo = 'consulta4'; // Id del div de la consulta 1
        } elseif (isset($_POST["consulta5"])) {
            /* 
    Consulta 5
    -----------------------------------------------------
    Encontrar aquellos países que dispongan tanto de acorazados como de cruceros.
*/

            $query5 = "SELECT DISTINCT r.NOMBRE_BATALLA FROM RESULTADOS r
    JOIN BARCO_CLASE bc ON r.NOMBRE_BARCO = bc.NOMBRE_BARCO
    WHERE bc.CLASE = 'KONGO'";

            $resultado5 = $conexion->query($query5);

            echo "<h2>Consulta 5: Batallas con barcos de la clase KONGO</h2>";
            echo "<div class='tabla'>";
            echo "<table>";
            echo "<tr><th>Batalla</th></tr>";
            while ($fila = $resultado5->fetch_assoc()) {
                echo "<tr><td>" . $fila["NOMBRE_BATALLA"] . "</td></tr>";
            }
            echo "</table>";
            echo "</div>";
            $scrollTo = 'consulta5'; // Id del div de la consulta 1
        }
    }

    // Cerrar conexión
    $conexion->close();
    ?>
</body>

</html>