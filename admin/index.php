<?php

$resultado = $_GET['resultado'] ?? null; //si no existe se le asigna null

require '../includes/funciones.php';
incluirTemplates('header');

?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Creado correctamente</p>
    <?php endif ?>

    <a href="../../bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
</main>

<?php

incluirTemplates('footer');
?>