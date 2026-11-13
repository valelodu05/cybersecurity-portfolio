<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar proveedor</title>
    <style>
        body {
            background-image: url("https://emprendepyme.net/wp-content/uploads/2023/03/gestion-proveedores.jpg");
            background-size: cover;
        }

        h1 {
            color: white;
            text-align: center;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
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
    <h1>Agregar proveedor</h1>
  
  <form action="agregar_proveedor.php" method="POST">
    <label for="nit_pro">NIT del proveedor</label>
    <input type="text" name="nit_pro" required><br><br>
    
    <label for="nom_pro">Nombre del proveedor:</label>
    <input type="text" name="nom_pro" required><br><br>
    
    <label for="tel_pro">Telefono del proveedor:</label>
    <input type="text" name="tel_pro" required><br><br>
    
    <input type="submit" value="Agregar proveedor">
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

    $isTouch = isset($_POST["nit_pro"]);
    if ($isTouch){
        $nit_pro = $_POST['nit_pro'];
         // Obtener los valores del formulario
        $nom_pro = $_POST['nom_pro'];
        $tel_pro = $_POST['tel_pro'];
        
        // Insertar el nuevo producto en la base de datos
        $query = "INSERT INTO proveedores (nit_pro, nom_pro, tel_pro) VALUES ('$nit_pro', '$nom_pro', '$tel_pro')";

        if (mysqli_query($conexion, $query)) {
            echo "Proveedor agregado exitosamente.";
        } else {
            echo "Error al agregar el proveedor: " . mysqli_error($conexion);
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
  ?>
</body>
</html>