<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar vendedor</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url("https://bam-mentors.com/wp-content/uploads/2017/05/vendedores.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            margin-top: 250px; 
        }

        .content {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            padding: 5px;
        }

        input[type="submit"] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>

</head>
<body>
    <div class="content">
    <form action="consultar_vendedor.php" method="post">
    <label for="ide_ven" style="font-size: 30px; color: white;">ID del vendedor:</label>
    <input type="text" id="ide_ven" name="ide_ven"><br>
    <input type="submit" value="Consultar">
    </form>
    <a href="../vendedor/vendedor.html">Volver</a>
    <?php
    // Conexión a la base de datos
    $conn = mysqli_connect("190.15.16.205", "natalia", "natalia23", "supermercado");

    // Verificación de la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Obtener el ID del producto
    //if ($ide_ven)
    $isTouch = isset($_POST["ide_ven"]);
    if ($isTouch){
        $ide_ven=$_POST["ide_ven"];
    // Consulta a la base de datos
    $sql = "SELECT * FROM vendedor WHERE ide_ven = '$ide_ven'";
    $result = mysqli_query($conn, $sql);

    // Mostrar el resultado de la consulta en una tabla
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID del vendedor</th><th>ID</th><th>Nombre del vendedor</th><th>Telefono del vendedor</th><th>Email del vendedor</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["ide_ven"]."</td><td>".$row["nom_ven"]."</td><td>".$row["tel_ven"]."</td><td>".$row["email_ven"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Vendedor no encontrado.";
    }

    }
    
    mysqli_close($conn);
    ?>
    </div>
</body>
</html>