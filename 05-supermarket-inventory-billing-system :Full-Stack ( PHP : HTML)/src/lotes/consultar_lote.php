<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar lote</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-image: url("https://fenixinternacionalw.com/wp-content/uploads/2021/03/liquidacion-mercancia-por-cese-de-negocio-1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ebebeb;
        }
    </style>
</head>
<body>
    <form action="consultar_lotes.php" method="post">
    <label for="ide_lot">ID del lote:</label>
    <input type="text" id="ide_lot" name="ide_lot"><br>
    <input type="submit" value="Consultar">
    </form>
    <a href="../lotes/lotes.html">Volver</a>
    <?php
    // Conexión a la base de datos
    $conn = mysqli_connect("190.15.16.205", "natalia", "natalia23", "supermercado");

    // Verificación de la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Obtener el ID del producto
    //if ($ide_lot)
    $isTouch = isset($_POST["ide_lot"]);
    if ($isTouch){
        $ide_lot=$_POST["ide_lot"];
    // Consulta a la base de datos
    $sql = "SELECT * FROM lotes WHERE ide_lot = '$ide_lot'";
    $result = mysqli_query($conn, $sql);

    // Mostrar el resultado de la consulta en una tabla
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID del lote</th><th>ID</th><th>Fecha de fabricacion del lote</th><th>fecha de vencimiento del lote</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["ide_lot"]."</td><td>".$row["fec_fab_lot"]."</td><td>".$row["fec_ven_lot"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Lote no encontrado.";
    }

    }
    
    mysqli_close($conn);
    ?>
</body>
</html>