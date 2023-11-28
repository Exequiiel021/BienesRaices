<?php
require './includes/funciones.php';

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

//IMPORTAR BASE DE DATOS
require 'includes/config/database.php'; //ruta relativa porque el que llama todo es el index, por eso es lativa desde el index
$db = conectarDB();

//CONSULTAR
$query = "SELECT * FROM propiedades WHERE id={$id}";

//OBTENER LOS RESULTADOS
$resultado = mysqli_query($db, $query);
$propiedad = mysqli_fetch_assoc($resultado);

incluirTemplates('header');
?>

<section class="seccion contenedor contenido-centrado">

    <h1><?php echo $propiedad['titulo']; ?></h1>

     
                <img loading="lazy" src="./imagenes/<?php echo $propiedad['imagen'] . ".jpg"; ?>" alt="anuncio">
            

            <div class="resumen-propiedad">            
                <p>Casa en el lago con excelente vista, acabado de lujo a un excelente precio</p>
                <p class="precio">$<?php echo $propiedad['precio']; ?></p>

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

               <p>
               <?php echo $propiedad['descripcion']; ?>
               </p>
            </div> <!--contenido-anuncio-->




</section>

<?php

mysqli_close($db);

incluirTemplates('footer');
?>