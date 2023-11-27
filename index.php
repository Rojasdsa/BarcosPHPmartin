<?php
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
while ($fila = $resultado1->fetch_assoc()) {
    echo "Nombre del Barco: " . $fila["NOMBRE_BARCO"] . " | Cañones: " . $fila["NRO_CANIONES"] . " | Desplazamiento: " . $fila["DESPLAZAMIENTO"] . "<br>";
}

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
while ($fila = $resultado2->fetch_assoc()) {
    echo "País: " . $fila["PAIS"] . "<br>";
}

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
while ($fila = $resultado3->fetch_assoc()) {
    echo "Batalla: " . $fila["NOMBRE_BATALLA"] . " | País: " . $fila["PAIS"] . " | Cantidad de Barcos: " . $fila["Cantidad_Barcos"] . "<br>";
}

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
while ($fila = $resultado4->fetch_assoc()) {
    echo "País: " . $fila["PAIS"] . " | Máximo de Cañones: " . $fila["Max_Cañones"] . "<br>";
}

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
while ($fila = $resultado5->fetch_assoc()) {
    echo "Batalla: " . $fila["NOMBRE_BATALLA"] . "<br>";
}

// Cerrar conexión
$conexion->close();
