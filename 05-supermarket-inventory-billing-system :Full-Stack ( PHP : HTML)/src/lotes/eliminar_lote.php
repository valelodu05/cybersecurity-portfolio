<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar lote</title>
</head>
<body>
    <h1>Eliminar lote</h1>
    <form action="eliminar_lote.php" method="POST">
        <label for="ide_lot">ID del lote:</label>
        <input type="text" name="ide_lot" required><br><br>
        <input type="submit" value="Eliminar Lote">
    </form>
    <a href="../lotes/lotes.html">Volver</a>
    <?php

        // Realizar la conexión a la base de datos
        $host = "190.15.16.205"; // Cambiar por el nombre de tu host de la base de datos
        $usuario = "natalia"; // Cambiar por el nombre de usuario de la base de datos
        $contraseña = "natalia23"; // Cambiar por la contraseña de la base de datos
        $base_de_datos = "supermercado"; // Cambiar por el nombre de la base de datos

        $conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

        // Verificar si la conexión fue exitosa
        if (mysqli_connect_errno()) {
        echo "Error al conectar a la base de datos: " . mysqli_connect_error();
        exit();
        }
        $isTouch = isset($_POST["ide_lot"]);
        if ($isTouch){
            // Obtener el ID del producto a eliminar
            $ide_lot = $_POST['ide_lot'];

            // Eliminar el producto de la base de datos
            $query = "DELETE FROM lotes WHERE ide_lot = '$ide_lot'";

            if (mysqli_query($conexion, $query)) {
            echo "Lote eliminado exitosamente.";
            } else {
            echo "Error al eliminar el lote: " . mysqli_error($conexion);
            }

        }


        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
?>
</body>
</html>