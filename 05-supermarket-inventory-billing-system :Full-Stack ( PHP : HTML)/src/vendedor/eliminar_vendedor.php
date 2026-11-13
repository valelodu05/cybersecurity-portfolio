<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar vendedor</title>
    <style>
        /* Estilos para el cuerpo del documento */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://previews.123rf.com/images/jackf/jackf1602/jackf160203005/52546352-vendedor-amigable-pesar-pl%C3%A1tanos-en-escala-para-la-mujer-joven-en-supermercado.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            margin-top: 250px; 

        }
        .content {
            text-align: center;
        }

        /* Estilos para el encabezado */
        h1 {
        color: white;
        }

        /* Estilos para el formulario */
        form {
        margin-top: 20px;
        }

        label {
        display: block;
        margin-bottom: 10px;
        }

        input[type="text"] {
        width: 200px;
        padding: 5px;
        }

        input[type="submit"] {
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        border: none;
        cursor: pointer;
        }

        input[type="submit"]:hover {
        background-color: #555;
        }
        </style>
</head>
<body>
    <div class= "content">
    <h1>Eliminar Vendedor</h1>
    <form action="eliminar_vendedor.php" method="POST">
        <label for="ide_ven" style="color: white;">ID del vendedor:</label>
        <input type="text" name="ide_ven" required><br><br>
        <input type="submit" value="Eliminar vendedor">
    </form>
    <a href="../vendedor/vendedor.html">Volver</a>
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
        $isTouch = isset($_POST["ide_ven"]);
        if ($isTouch){
            // Obtener el ID del producto a eliminar
            $ide_ven = $_POST['ide_ven'];

            // Eliminar el producto de la base de datos
            $query = "DELETE FROM vendedor WHERE ide_ven = '$ide_ven'";

            if (mysqli_query($conexion, $query)) {
            echo "Vendedor eliminado exitosamente.";
            } else {
            echo "Error al eliminar el vendedor: " . mysqli_error($conexion);
            }

        }


        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
?>
</div>
</body>
</html>