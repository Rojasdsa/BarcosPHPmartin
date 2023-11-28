<?php
/* Consulta 4
-----------------------------------------------------
Encontrar aquellos países que dispongan tanto de acorazados como de cruceros.*/

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

$scrollTo = 'consulta4'; // Id del div de la consulta 4
