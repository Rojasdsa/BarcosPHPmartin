<?php
/* Consulta 5
-----------------------------------------------------
Encontrar aquellos países que dispongan tanto de acorazados como de cruceros.*/

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

$scrollTo = 'consulta5'; // Id del div de la consulta 5


// Cerrar conexión

$conexion->close();
