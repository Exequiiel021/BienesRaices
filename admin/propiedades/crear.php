<?php

//BASE DE DATOS
require '../../includes/config/database.php';
$db = conectarDB(); //llamamos la funcion creada en database

//CONSULTAR PARA OBTENER LOS VENDEDORES
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db,$consulta);

//ARREGLO PARA LOS ERRORES
$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';

//forma de acceder y mostrar con SERVER los valores del POST, recordar POST  es para mas seguridad de datos, GET para que sea visible en la barra del navegador
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    //FILES NOS PERMITE VER CON MAYOR CLARIDAD LA INFORMACION DEL ARCHIVO
    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";

    // mysqli_real_escape_string : para evitar que el usuario inserte datos a nuestra base de datos de tal forma que cause problemas
    $titulo =  mysqli_real_escape_string($db, $_POST['titulo']);
    $precio =  mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion =  mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones =  mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc =  mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento =  mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id =  mysqli_real_escape_string($db, $_POST['vendedores_id']);
    $creado = date('Y/m/d');

    //ASIGNAR FILES A UNA VARIABLE
    $imagen = $_FILES['imagen'];

    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }

    if (!$precio) {
        $errores[] = "Debes añadir un precio";
    }

    if (strlen($descripcion) < 20) {
        $errores[] = "Debes añadir una descripcion y debe tener mas de 20 caracteres"; //para eso sirve strlen para establecer un max o min de caracteres
    }

    if (!$habitaciones) {
        $errores[] = "Debes añadir un numero de habitaciones";
    }

    if (!$wc) {
        $errores[] = "Debes añadir un numero para baños";
    }

    if (!$estacionamiento) {
        $errores[] = "Debes añadir lugares de estacionamiento";
    }

    if (!$vendedores_id) {
        $errores[] = "Debes escoger un vendedor";
    }

    if ((!$imagen['name']) || $imagen['error']) {
        $errores[] = "La imagen es obligatoria";
    }

    //VALIDAR POR TAMAÑO LAS FOTOS (200kb)
    $medida = 10000 * 1024; //convetir de bytes a kilobytes.
    $megabytes = $medida / 1024;

    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada, maximo de";
    }

    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";

    //REVISAR QUE ARREGLO DE ERRORES ESTE VACIO
    if (empty($errores)) { //empty revisa que no este vacio el arreglo

        //SUBIDA DE ARCHIVOS

        //CREAR UNA CARPETA
        $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes); //crear un directorio con mkdir
        }

        //GENERAR UN NOMBRE UNICO
        $nombreImagen = md5( uniqid( rand(), true ));

        //SUBIR LA IMAGEN
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen . ".jpg"); 

        //INSERTAR EN LA BASE DE DATOS
        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUE 
        ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id') ";

        //echo ($query);    

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            // REDIRECCIONAR AL USUARIO
            header('Location: /bienesraices/admin/index.php?resultado=1');
        }
    }
}

require '../../includes/funciones.php';
incluirTemplates('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="http://localhost/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="../../admin/propiedades/crear.php" enctype="multipart/form-data">

        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php  echo $titulo; ?>">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php  echo $precio; ?>">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg , image/png" name="imagen">

            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion"><?php  echo $descripcion; ?></textarea>

        </fieldset>

        <fieldset>

            <legend>Informacion Propiedad</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej:2" min="1" max="9" value="<?php  echo $habitaciones; ?>">

            <label for="wc">Baños</label>
            <input type="number" id="wc" name="wc" placeholder="Ej:2" min="1" max="9" value="<?php  echo $wc; ?>">

            <label for="estacionamieto">Estacionamieto</label>
            <input type="number" id="estacionamieto" name="estacionamiento" placeholder="Ej:2" min="1" max="9" value="<?php  echo $estacionamiento; ?>">
            
        </fieldset>

        <fieldset>

            <legend>Vendedor</legend>

            <select name="vendedores_id">
                <option value="">-- Selecione --</option>
                <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                    <option <?php echo $vendedores_id === $row['id'] ? 'selected' : '';?> value="<?php echo $row['id']; ?>"> 
                    <?php echo $row['nombre'] . " " . $row['apellido'];?> </option> 
                <?php endwhile; ?>   
            </select>

        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php

incluirTemplates('footer');
?>
