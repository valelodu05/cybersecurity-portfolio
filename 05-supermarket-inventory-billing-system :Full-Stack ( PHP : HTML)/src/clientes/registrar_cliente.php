<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Registrar Cliente</title>
    <style>
        body {
            background-image: url('https://thumbs.dreamstime.com/b/cliente-y-cajero-facturan-un-recibo-el-comprueban-conjuntamente-en-supermercado-180422180.jpg');
            background-size: cover;
        }

        h1 {
            color: #333;
            text-align: center;
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
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            font-size: 16px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Registrar Cliente</h1>
  
  <form action="registrar_cliente.php" method="POST">
    <label for="nom_pro">ID Cliente:</label>
    <input type="text" name="ide_cli" required><br><br>
    
    <label for="ide_pro">Nombre del cliente:</label>
    <input type="text" name="nom_cli" required><br><br>
    
    <label for="val_ven_pro">Telefono del cliente:</label>
    <input type="text" name="tel_cli" required><br><br>
    
    <label for="can_pro">Direccion del cliente:</label>
    <input type="text" name="dir_cli" required><br><br>
    
    <label for="val_com_pro">Email del cliente:</label>
    <input type="text" name="email_cli" required><br><br>

    <input type="submit" value="Registrar Cliente">
  </form>
  <a href="../clientes/clientes.html">Volver</a>

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

    $isTouch = isset($_POST["ide_cli"]);
    if ($isTouch){
        $ide_cli = $_POST['ide_cli'];
         // Obtener los valores del formulario
        $nom_cli = $_POST['nom_cli'];
        $tel_cli = $_POST['tel_cli'];
        $dir_cli = $_POST['dir_cli'];
        $email_cli = $_POST['email_cli'];


        // Insertar el nuevo producto en la base de datos
        $query = "INSERT INTO clientes (ide_cli, nom_cli, tel_cli, dir_cli, email_cli) VALUES ('$ide_cli', '$nom_cli', '$tel_cli', '$dir_cli', '$email_cli')";

        if (mysqli_query($conexion, $query)) {
            echo "Cliente registrado exitosamente.";
        } else {
            echo "Error al registrar el cliente: " . mysqli_error($conexion);
            }

    }
    // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    ?>
</body>
</html>