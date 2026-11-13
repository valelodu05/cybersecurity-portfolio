<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Categoría</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://www.elcolombiano.com/documents/10157/0/919x565/70c0/780d565/none/11101/NHCF/image_content_22996227_20150316105446.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
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

        table {
            width: 100%;
            border-collapse: collapse;
            position: relative;
            margin-top: 20px; /* Agregado: Espacio entre el formulario y la tabla */
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .table-overlay {
            position: relative;
        }

        .table-overlay::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 2;
        }

        /* Agregado: Estilos para la letra */
        .table-overlay::before {
            content: "Resultados de la consulta:";
            position: absolute;
            top: -30px;
            left: 0;
            font-size: 18px;
            font-weight: bold;
            color: #000;
        }
    </style>
</head>
<body>
    <form action="consultar_categoria.php" method="post">
        <label for="ide_cat">ID de la categoría:</label>
        <input type="text" id="ide_cat" name="ide_cat"><br>
        <input type="submit" value="Consultar">
    </form>
    <a href="../categorias/categorias.html">Volver</a>

    <?php
    // Conexión a la base de datos
    $conn = mysqli_connect("190.15.16.205", "natalia", "natalia23", "supermercado");

    // Verificación de la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Obtener el ID de la categoría
    $isTouch = isset($_POST["ide_cat"]);
    if ($isTouch){
        $ide_cat = $_POST["ide_cat"];

        // Consulta a la base de datos
        $sql = "SELECT * FROM categorias WHERE ide_cat = '$ide_cat'";
        $result = mysqli_query($conn, $sql);

        // Mostrar el resultado de la consulta en una tabla
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table-overlay">';
            echo "<tr><th>ID de la categoría</th><th>Descripción de la categoría</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row["ide_cat"]."</td><td>".$row["des_cat"]."</td></tr>";
            }
            echo '</table>';
        } else {
            echo "Categoría no encontrada.";
        }
    }
    
    mysqli_close($conn);
    ?>
</body>
</html>