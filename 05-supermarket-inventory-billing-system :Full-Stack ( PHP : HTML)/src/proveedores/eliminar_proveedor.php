<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar proveedor</title>
    <style>
        body {
            background-image: url("https://www.darumasoftware.com/wp-content/uploads/2021/10/Gestion-de-Proveedores.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
            margin-top: 130px; 
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Eliminar proveedor</h1>
    <form action="eliminar_proveedor.php" method="POST">
        <label for="nit_pro">NIT del proveedor</label>
        <input type="text" name="nit_pro" required><br><br>
        <input type="submit" value="Eliminar Proveedor">
    </form>
    <a href="../proveedores/proveedores.html">Volver</a>
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
        $isTouch = isset($_POST["nit_pro"]);
        if ($isTouch){
            // Obtener el ID del producto a eliminar
            $nit_pro = $_POST['nit_pro'];

            // Eliminar el producto de la base de datos
            $query = "DELETE FROM proveedores WHERE nit_pro = '$nit_pro'";

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