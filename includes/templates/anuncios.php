<?php

//IMPORTAR BASE DE DATOS
require 'includes/config/database.php'; //ruta relativa porque el que llama todo es el index, por eso es lativa desde el index
$db = conectarDB();

//CONSULTAR
$query = "SELECT * FROM propiedades LIMIT {$limite}";

//OBTENER LOS RESULTADOS
$resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
        <div class="anuncio">

            <img loading="lazy" src="./imagenes/<?php echo $propiedad['imagen'] . ".jpg"; ?>" alt="anuncio">


            <div class="contenido-anuncio">

                <h3 class=""><?php echo $propiedad['titulo']; ?></h3>

                <p><?php
                    $descripcion = $propiedad['descripcion'];
                    $descripcionCorta = substr($descripcion, 0, 117); //para truncar la descripcion y no altere la visualizacion
                    echo $descripcionCorta . "...";
                    ?></p>
                <p class="precio">$ <?php echo $propiedad['precio']; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad['wc']; ?></p>
                    </li>

                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono wc">
                        <p><?php echo $propiedad['estacionamiento']; ?></p>
                    </li>

                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono wc">
                        <p><?php echo $propiedad['habitaciones']; ?></p>
                    </li>
                </ul>

                <a href="anuncio.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block">Ver Propiedad</a>

            </div> <!--contenido-anuncio-->
        </div><!--anuncio-->
    <?php endwhile ?>
</div><!--contenedor anuncio-->

<?php 
    //cerrar la conexion
    mysqli_close($db);
?>