<?php

declare(strict_types=1);

require './includes/funciones.php';

incluirTemplates("header", $inicio = true);

?>

<main class="contenedor seccion">
    <h1>Mas sobre Nosotros</h1>

    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="icono-seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cumque possimus laudantium magnam
                culpa hic, excepturi eveniet veniam ab reprehenderit impedit autem
                perferendis nam laborum deleniti esse atque facilis laboriosam!</p>
        </div>

        <div class="icono">
            <img src="build/img/icono2.svg" alt="icono-precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cumque possimus laudantium magnam
                culpa hic, excepturi eveniet veniam ab reprehenderit impedit autem
                perferendis nam laborum deleniti esse atque facilis laboriosam!</p>
        </div>

        <div class="icono">
            <img src="build/img/icono3.svg" alt="icono-atiempo" loading="lazy">
            <h3>A Tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cumque possimus laudantium magnam
                culpa hic, excepturi eveniet veniam ab reprehenderit impedit autem
                perferendis nam laborum deleniti esse atque facilis laboriosam!</p>
        </div>

    </div>
</main>

<section class="seccion contenedor">

    <h2>Casas y Depas en Venta</h2>

    <?php 
        $limite = 3;
        include 'includes/templates/anuncios.php';
    ?>

    <div class="alinear-derecha">
        <a href="anuncios.html" class="boton-verde">Ver todas</a>
    </div>

</section>

<section class="imagen-contacto">

    <h2>Encuentra la Casa de tus Sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
    <a href="contactos.html" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="texto-entrada-blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu Casa</h4>
                    <p>Escrito el : <span>23/10/2023</span> por: <span>Admin</span></p>

                    <p>Consejos para construir una terraza en el techo con los mejores materiales y ahorrar dinero
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="texto-entrada-blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p>Escrito el : <span>23/10/2023</span> por: <span>Admin</span></p>

                    <p>Maximiza el espacio en tu hogar con esta guia, aprende a cambiar muebles y colores para darle
                        vida a tu espacio
                    </p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal se comporto de una excelente forma, muy buena atención y la casa que me ofrecieron
                cumple todas mis expectativas.
            </blockquote>
            <p>- Exe Godoy</p>

        </div>
    </section>
</div>

<?php

include './includes/templates/footer.php';
?>