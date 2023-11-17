<?php
    require './includes/funciones.php';
    
    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>
    </main>

    <section class="contenedor sobre-nosotros">
        <div>
            <picture class="imagen">
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="texto-entrada-blog">
            </picture>
        </div>

        <div>
            <h4>25 Años de Experiencia</h4>

            <p>Proin consequat viverra sapien, malesuada tempor tortor feugiat vitae. In dictum felis et nunc aliquet
                molestie. Proin tristique commodo felis, sed auctor
                elit auctor pulvinar. Nunc porta, nibh quis convallis sollicitudin,
                arcu nisl semper mi, vitae sagittis lorem dolor non risus. Vivamus accumsan maximus est, eu mollis mi.
                Proin id nisl vel odio semper hendrerit. Nunc porta in justo finibus tempor.
                Suspendisse lobortis dolor quis elit suscipit molestie. Sed condimentum, erat at tempor finibus, urna
                nisi fermentum est, a dignissim nisi libero vel est. Donec et imperdiet augue.
                Curabitur malesuada sodales congue. Suspendisse potenti. Ut sit amet convallis nisi.
            </p>

            <p>Aliquam lectus magna, luctus vel gravida nec, iaculis ut augue. Praesent ac enim lorem. Quisque ac
                dignissim sem, non condimentum orci. Morbi a iaculis neque, ac euismod felis.
                Fusce augue quam, fermentum sed turpis nec, hendrerit dapibus ante. Cras mattis laoreet nibh, quis
                tincidunt odio fermentum vel. Nulla facilisi.</p>
        </div>
    </section>

    <section class="contenedor">
        <h1>Mas sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono-seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cumque possimus laudantium magnam culpa hic, excepturi eveniet veniam ab reprehenderit impedit autem
                     perferendis nam laborum deleniti esse atque facilis laboriosam!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono-precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cumque possimus laudantium magnam culpa hic, excepturi eveniet veniam ab reprehenderit impedit autem
                     perferendis nam laborum deleniti esse atque facilis laboriosam!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono-atiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto cumque possimus laudantium magnam culpa hic, excepturi eveniet veniam ab reprehenderit impedit autem
                     perferendis nam laborum deleniti esse atque facilis laboriosam!</p>
            </div>

        </div>
    </section>

    <?php
    
    incluirTemplates('footer');
?>