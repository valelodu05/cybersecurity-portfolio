<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar proveedor</title>
    <style>
        body {
            background-image: url("https://thelogisticsworld.com/wp-content/uploads/2022/07/conduccion-carretilla-elevadora.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            margin-top: 250px; 
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            padding: 5px;
            width: 200px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <form action="consultar_proveedor.php" method="post">
        <label for="nit_pro"style="font-size: 30px; font-weight: bold;">NIT del proveedor</label>
        <input type="text" id="nit_pro" name="nit_pro"><br>
        <input type="submit" value="Consultar">
    </form>
    <a href="../proveedores/proveedores.html">Volver</a>
    <?php
    // Conexión a la base de datos
    $conn = mysqli_connect("190.15.16.205", "natalia", "natalia23", "supermercado");

    // Verificación de la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Obtener el ID del producto
    $isTouch = isset($_POST["nit_pro"]);
    if ($isTouch){
        $nit_pro=$_POST["nit_pro"];
        // Consulta a la base de datos
        $sql = "SELECT * FROM proveedores WHERE nit_pro = '$nit_pro'";
        $result = mysqli_query($conn, $sql);

        // Mostrar el resultado de la consulta en una tabla
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>nit_pro</th><th>ID</th><th>nombre del proveedor</th><th>telefono del proveedor</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row["nit_pro"]."</td><td>".$row["nom_pro"]."</td><td>".$row["tel_pro"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Proveedor no encontrado.";
        }
    }

    mysqli_close($conn);
    ?>
</body>
</html>