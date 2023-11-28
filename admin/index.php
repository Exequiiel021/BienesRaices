<?php

//IMPORTAR LA CONEXION
require '../includes/config/database.php';
$db = conectarDB(); //llamamos la funcion creada en database

//ESCRIBIR LA QUERY
$query = 'SELECT * FROM propiedades';

//CONSULTAR LA BASE DE DATOS
$resultadoConsulta = mysqli_query($db, $query);


//Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null; //si no existe se le asigna null

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {

        //ELIMINAR EL ARCHIVO
        $query = "SELECT imagen FROM propiedades WHERE id=$id";

        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink('../../imagenes/' . $propiedad['imagen'] . ".jpg");


        //ELIMINAR LA PROPIEDAD
        $query = "DELETE FROM propiedades WHERE id = $id";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: http://localhost/bienesraices/admin/index.php?resultado=3');
        }
    }
}

//Incluye un template
require '../includes/funciones.php';
incluirTemplates('header');

?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Creado Correctamente</p>
    <?php elseif (intval($resultado) === 2) : ?>
        <p class="alerta exito">Actualizado Correctamente</p>
    <?php elseif (intval($resultado) === 3) : ?>
        <p class="alerta exito">Borrado Correctamente</p>
    <?php endif ?>

    <a href="../../bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagenes</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                <tr>
                    <td> <?php echo $propiedad['id'] ?> </td>
                    <td><?php echo $propiedad['titulo'] ?></td>
                    <td> <img src="../imagenes/<?php echo $propiedad['imagen'] . ".jpg"; ?>" class="imagen-tabla" </td>
                    <td>$ <?php echo $propiedad['precio'] ?></td>
                    <td>
                        <form action="" method="POST" class="w-100">

                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">

                            <input type="submit" class="boton-rojo" value="Eliminar">
                        </form>

                        <a href="./propiedades//actualizar.php?id=<?php echo $propiedad['id'] ?>;" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</main>

<?php

//CERRAR CONEXION
mysqli_close($db);

incluirTemplates('footer');
?>