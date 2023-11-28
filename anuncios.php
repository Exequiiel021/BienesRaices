<?php
require './includes/funciones.php';

incluirTemplates('header');
?>

<main class="seccion contenedor">

    <h2>Casas y Depas en Venta</h2>

    <?php 
        $limite = 12;
        include 'includes/templates/anuncios.php';
    ?>

</main>

<?php

incluirTemplates('footer');
?>