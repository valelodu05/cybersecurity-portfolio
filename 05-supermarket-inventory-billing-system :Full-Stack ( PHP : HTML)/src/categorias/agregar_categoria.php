<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar categoría</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://thumbs.dreamstime.com/b/el-carro-de-la-compra-de-la-comida-en-pasillo-del-supermercado-elev%C3%B3-por-completo-la-visi%C3%B3n-63616470.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Agregar Categoría</h1>
    <form action="agregar_categoria.php" method="POST">
        <label for="ide_cat">ID de la categoría:</label>
        <input type="text" name="ide_cat" required><br><br>
        
        <label for="des_cat">Descripción de la categoría:</label>
        <input type="text" name="des_cat" required><br><br>
        
        <input type="submit" value="Agregar Categoría">
    </div>
    </form>
    <a href="../categorias/categorias.html">Volver</a>

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
        $isTouch = isset($_POST["ide_cat"]);
        if ($isTouch){

            // Obtener los valores del formulario
            $ide_cat = $_POST['ide_cat'];
            $des_cat = $_POST['des_cat'];

            // Insertar la nueva categoría en la base de datos
            $query = "INSERT INTO categorias (ide_cat, des_cat) VALUES ('$ide_cat', '$des_cat')";

            if (mysqli_query($conexion, $query)) {
            echo "Categoría agregada exitosamente.";
            } else {
            echo "Error al agregar la categoría: " . mysqli_error($conexion);
            }

        }
        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    ?>
</body>
</html>