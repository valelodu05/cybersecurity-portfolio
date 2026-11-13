<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://okdiario.com/img/2021/11/25/franki-chamaki-ivfp_yxzuyq-unsplash11.jpg'); /* Ruta de la imagen de fondo */
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

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            background: none;
            border: none;
        }

        input[type="text"] {
            padding: 5px;
            width: 100%;
            font-family: Arial, sans-serif;
            border-radius: 3px;
            border: 1px solid #cccccc;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #cccccc;
        }

        th {
            background-color: #f5f5f5;
        }

        .error-message {
            color: #ff0000;
            margin-top: 20px;
        }
        .container {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container > * {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
    <form action="consultar_producto.php" method="post">
        <h1 for="ide_pro">ID del producto:</h1>
        <input type="text" id="ide_pro" name="ide_pro" class="valeria"><br>
        <input type="submit" value="Consultar">
    </form>
    <a href="../productos/cproductos.html">Volver</a>
    <?php
    // Conexión a la base de datos
    $conn = mysqli_connect("190.15.16.205", "natalia", "natalia23", "supermercado");

    // Verificación de la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Obtener el ID del producto
    $isTouch = isset($_POST["ide_pro"]);
    if ($isTouch){
        $ide_pro=$_POST["ide_pro"];
    
        // Consulta a la base de datos
        $sql = "SELECT * FROM productos WHERE ide_pro = '$ide_pro'";
        $result = mysqli_query($conn, $sql);

        // Mostrar el resultado de la consulta en una tabla
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Nombre</th><th>ID</th><th>Valor de venta</th><th>Cantidad</th><th>Valor de compra</th><th>ID de categoría</th><th>ID de lote</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row["nom_pro"]."</td><td>".$row["ide_pro"]."</td><td>".$row["val_ven_pro"]."</td><td>".$row["can_pro"]."</td><td>".$row["val_com_pro"]."</td><td>".$row["ide_cat"]."</td><td>".$row["ide_lot"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='error-message'>Producto no encontrado.</p>";
        }
    }
    
    mysqli_close($conn);
    ?>
    </div>
</body>
</html>