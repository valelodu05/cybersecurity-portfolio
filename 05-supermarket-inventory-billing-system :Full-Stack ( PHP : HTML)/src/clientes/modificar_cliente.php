<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
    <style>
        body {
            background-image: url("https://c8.alamy.com/compes/2cetpmt/cajero-que-emite-articulos-para-el-cliente-en-la-caja-registradora-en-moderno-supermercado-2cetpmt.jpg");
            background-size: cover;
            background-position: center;
        }
        h1 {
            color: white;
            text-align: center;
        }
        form {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #337ab7;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #286090;
        }
    </style>
</head>
<body>
<h1>Modificar Cliente</h1>
  
  <form action="modificar_cliente.php" method="POST">
    <label for="ide_pro">ID del cliente:</label>
    <input type="text" name="ide_cli" required><br><br>
    
    <label for="nom_pro">Nombre del cliente:</label>
    <input type="text" name="nom_cli"><br><br>
    
    <label for="val_ven_pro">Telefono del cliente:</label>
    <input type="text" name="tel_cli"><br><br>
    
    <label for="can_pro">Direccion del cliente:</label>
    <input type="text" name="dir_cli"><br><br>
    
    <label for="val_com_pro">Email del cliente:</label>
    <input type="text" name="email_cli"><br><br>

    <input type="submit" value="Modificar Cliente">
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
    // Obtener el ID del producto a actualizar
    $isTouch = isset($_POST["ide_cli"]);
    if ($isTouch){
        $ide_pro=$_POST["ide_cli"];
           // Obtener los nuevos valores del formulario
        $nom_pro = $_POST['nom_cli'];
        $val_ven_pro = $_POST['tel_cli'];
        $can_pro = $_POST['dir_cli'];
        $val_com_pro = $_POST['email_cli'];

        // Actualizar el producto en la base de datos
        $query = "UPDATE clientes SET";

        if (!empty($nom_cli)) {
        $query .= " nom_cli = '$nom_cli',";
        }

        if (!empty($tel_cli)) {
        $query .= " tel_cli = '$tel_cli',";
        }

        if (!empty($dir_cli)) {
        $query .= " dir_cli = '$dir_cli',";
        }

        if (!empty($email_cli)) {
        $query .= " email_cli = '$email_cli',";
        }

        $query = rtrim($query, ","); // Eliminar la última coma

        $query .= " WHERE ide_cli = '$ide_cli'";

        if (mysqli_query($conexion, $query)) {
        echo "Cliente actualizado exitosamente.";
        } else {
        echo "Error al actualizar el cliente: " . mysqli_error($conexion);
        }

    }
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

?>

</body>
</html>