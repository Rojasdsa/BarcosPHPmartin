<?php
include_once("modelo.php");
?>

<!-- Hoja HTML-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ships Boats, Old Histotry</title>
    <!-- Referencia de estilos CSS y JS  -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script defer src="assets/js/script.js"></script>
</head>

<body>
    <!-- LOGO -->
    <div class="logo-container">
        <div class="logo-bar"></div>
        <img src="assets/img/logo-barcos.png" alt="Old History" class="logo" id="idlogo">
    </div>

    <!-- BOTONES PARA CONSULTAS -->
    <div class=pack-cont-botones>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="contenedor-botones">
                <button type="button" onclick="scrollToConsulta('consulta1')" class="boton-consulta">Consulta 1</button>
                <button type="button" onclick="scrollToConsulta('consulta2')" class="boton-consulta">Consulta 2</button>
                <button type="button" onclick="scrollToConsulta('consulta3')" class="boton-consulta">Consulta 3</button>
                <button type="button" onclick="scrollToConsulta('consulta4')" class="boton-consulta">Consulta 4</button>
                <button type="button" onclick="scrollToConsulta('consulta5')" class="boton-consulta">Consulta 5</button>
            </div>
            <div class="contenedor-botones">
                <button type="button" onclick="scrollToConsulta('idlogo')" class="boton-volver">Volver</button>
            </div>
        </form>
    </div>

    <!-- CONSULTAS -->
    <div class="consultas-container">

        <div id="consulta1">
            <?php
            include_once("controladores/controlador1.php");
            ?>
        </div>

        <div id="consulta2">
            <?php
            include_once("controladores/controlador2.php");
            ?>
        </div>

        <div id="consulta3">
            <?php
            include_once("controladores/controlador3.php");
            ?>
        </div>

        <div id="consulta4">
            <?php
            include_once("controladores/controlador4.php");
            ?>
        </div>

        <div id="consulta5">
            <?php
            include_once("controladores/controlador5.php");
            ?>
        </div>

    </div>
</body>

</html>