<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">

            <div class="barra">

                <a href="/bienesraices/index.php">
                    <img src="/bienesraices/build/img/logo.svg" alt="Logotipo-bienes raicez">
                </a>

                <div class="mobile-menu">
                    <img src="/bienesraices/build/img/barras.svg" alt="menu-barra">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg" alt="modo-oscuro" >
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contactos.php">Contacto</a>
                    </nav>
                </div>
        
            </div>

            <?php if($inicio) { ?>
                <h1>Venta de Casas y Departamentos Exclusivo de Lujo</h1>
            <?php } ?>
            

        </div>
    </header>