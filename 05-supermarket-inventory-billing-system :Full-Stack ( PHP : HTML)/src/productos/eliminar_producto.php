<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://media.istockphoto.com/id/529664572/es/foto/fondo-de-frutas.jpg?s=612x612&w=0&k=20&c=ZD4dqnpnwQDcCNtR1uPbYqnkaYND192I7H_4lKqEn5I=');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #000000; /* Agrega el color de fondo negro */
            padding: 20px; /* Ajusta el espacio interno */
            border-radius: 10px; /* Agrega bordes redondeados */
        }

        h1 {
            color: #ffffff;
            font-size: 40px;
            margin-bottom: 20px;
            border: 2px solid #000000; /* Agrega un marco de 2px de ancho y color negro */
            padding: 10px; /* Agrega un espacio interno de 10px alrededor del título */
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #ffffff;
        }

        input[type="text"] {
            padding: 5px;
            width: 200px;
            font-family: "Times New Roman", serif;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #333333;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555555;
        }

        .success-message {
            margin-top: 20px;
            color: #007700;
        }

        .error-message {
            margin-top: 20px;
            color: #ff0000;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Eliminar Producto</h1>
        <form action="eliminar_producto.php" method="POST">
            <label for="ide_pro">ID del producto:</label>
            <input type="text" name="ide_pro" required><br><br>
            <input type="submit" value="Eliminar Producto">
            
        </form>
        <a href="../productos/cproductos.html">Volver</a>
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
        $isTouch = isset($_POST["ide_pro"]);
        if ($isTouch){
            // Obtener el ID del producto a eliminar
            $ide_pro = $_POST['ide_pro'];

            // Eliminar el producto de la base de datos
            $query = "DELETE FROM productos WHERE ide_pro = '$ide_pro'";

            if (mysqli_query($conexion, $query)) {
            echo "Producto eliminado exitosamente.";
            } else {
            echo "Error al eliminar el producto: " . mysqli_error($conexion);
            }

        }


        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
?>
   </div>
    </body>
</html>