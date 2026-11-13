<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar proveedor</title>
    <style>
        body {
            background-image: url("https://emprendedor.com/wp-content/uploads/2022/02/elegir-proveedor.jpg");
            background-size: cover;
            background-position: center;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h1>Actualizar proveedor</h1>
  
  <form action="actualizar_proveedor.php" method="POST">
    <label for="nit_pro">NIT del proveedor</label>
    <input type="text" name="nit_pro" required><br><br>
    
    <label for="nom_pro">Nombre del proveedor:</label>
    <input type="text" name="nom_pro"><br><br>
    
    <label for="tel_pro">Telefono del proveedor:</label>
    <input type="text" name="tel_pro"><br><br>

    <input type="submit" value="Actualizar Proveedor">
  </form>
  <a href="../proveedores/proveedores.html">Volver</a>

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
    $isTouch = isset($_POST["nit_pro"]);
    if ($isTouch){
        $nit_pro=$_POST["nit_pro"];
           // Obtener los nuevos valores del formulario
        $nit_pro = $_POST['nit_pro'];
        $nom_pro = $_POST['nom_pro'];
        $tel_pro = $_POST['tel_pro'];


        // Actualizar el producto en la base de datos
        $query = "UPDATE proveedores SET";

        

        if (!empty($nom_pro)) {
        $query .= " nom_pro = '$nom_pro',";
        }

        if (!empty($tel_pro)) {
        $query .= " tel_pro = '$tel_pro',";
        }

      
        $query = rtrim($query, ","); // Eliminar la última coma

        $query .= " WHERE nit_pro = '$nit_pro'";

        if (mysqli_query($conexion, $query)) {
        echo "Proveedor actualizado exitosamente.";
        } else {
        echo "Error al actualizar el proveedor: " . mysqli_error($conexion);
        }

    }
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

?>

</body>
</html>