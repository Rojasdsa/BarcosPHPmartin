<?php
/* Consulta 1
-----------------------------------------------------
Listar el nombre del barco, desplazamiento y cantidad de cañones, de los barcos que participaron en la batalla de Guadalcanal.*/

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
