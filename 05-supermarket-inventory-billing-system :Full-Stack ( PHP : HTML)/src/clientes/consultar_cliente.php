<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-image: url("https://img.freepik.com/fotos-premium/mujer-comprando-cosas-supermercado_274679-36341.jpg");
            background-size: cover;
            background-position: center;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
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
        .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
    <form action="consultar_cliente.php" method="post">
        <label for="ide_pro" style="font-size: 30px; font-weight: bold; color: #ffffff;">ID del cliente:</label>
        <input type="text" id="ide_cli" name="ide_cli"><br>
        <input type="submit" value="Consultar">
    </form>
    <a href="../clientes/clientes.html">Volver</a>
    </div>
    <?php
    // Conexión a la base de datos
    $conn = mysqli_connect("190.15.16.205", "natalia", "natalia23", "supermercado");

    // Verificación de la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Obtener el ID del producto
    //if ($ide_pro)
    $isTouch = isset($_POST["ide_cli"]);
    if ($isTouch){
        $ide_pro=$_POST["ide_cli"];
    // Consulta a la base de datos
    $sql = "SELECT * FROM clientes WHERE ide_cli = '$ide_cli'";
    $result = mysqli_query($conn, $sql);

    // Mostrar el resultado de la consulta en una tabla
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Telefono</th><th>Direccion</th><th>Email</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["ide_cli"]."</td><td>".$row["nom_cli"]."</td><td>".$row["tel_cli"]."</td><td>".$row["dir_cli"]."</td><td>".$row["email_cli"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Cliente no encontrado.";
    }

    }
    
    mysqli_close($conn);
    ?>
</body>
</html>