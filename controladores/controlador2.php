<?php
/* Consulta 2
-----------------------------------------------------
Encontrar aquellos países que dispongan tanto de acorazados como de cruceros.*/

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

$scrollTo = 'consulta2'; // Id del div de la consulta 2
