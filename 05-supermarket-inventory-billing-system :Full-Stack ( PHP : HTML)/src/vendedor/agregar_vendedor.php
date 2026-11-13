<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Agregar vendedor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-image: url('https://media.istockphoto.com/id/1024233602/es/foto/j%C3%B3venes-empresarios-estrecharme-la-mano-en-la-oficina-exitosa-reuni%C3%B3n-de-acabado.jpg?s=612x612&w=0&k=20&c=mxyUHMpnU_Ev8Fmru0NoYXewIAYGWcLfBMPmNQoW0Fw=');
            background-size: cover;
        }

        h1 {
            text-align: center;
            color: #007bff;
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
    </style>
</head>
<body>
    <h1>Agregar vendedor</h1>
  
  <form action="agregar_vendedor.php" method="POST">
    <label for="ide_ven">ID del vendedor:</label>
    <input type="text" name="ide_ven" required><br><br>
    
    <label for="nom_ven">Nombre del vendedor:</label>
    <input type="text" name="nom_ven" required><br><br>
    
    <label for="tel_ven">Telefono del vendedor:</label>
    <input type="text" name="tel_ven" required><br><br>
    
    <label for="email_ven">Email del vendedor:</label>
    <input type="text" name="email_ven" required><br><br>
    
   
    
    <input type="submit" value="Agregar vendedor">
  </form>
  <a href="../vendedor/vendedor.html">Volver</a>

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

    $isTouch = isset($_POST["ide_ven"]);
    if ($isTouch){
        $ide_ven = $_POST['ide_ven'];
         // Obtener los valores del formulario
        $nom_ven = $_POST['nom_ven'];
        $tel_ven = $_POST['tel_ven'];
        $email_ven = $_POST['email_ven'];
        


        // Insertar el nuevo producto en la base de datos
        $query = "INSERT INTO vendedor (ide_ven, nom_ven, tel_ven, email_ven) VALUES ('$ide_ven', '$nom_ven', '$tel_ven', '$email_ven')";

        if (mysqli_query($conexion, $query)) {
            echo "Vendedor agregado exitosamente.";
        } else {
            echo "Error al agregar el vendedor: " . mysqli_error($conexion);
            }

    }


    // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    ?>
</body>
</html>