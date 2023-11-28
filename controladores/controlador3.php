<?php
/* Consulta 3
-----------------------------------------------------
Encontrar aquellos países que dispongan tanto de acorazados como de cruceros.*/

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

$scrollTo = 'consulta3'; // Id del div de la consulta 3
