<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Agregar lote</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-image: url("https://orotexmayoristas.com/wp-content/uploads/2022/04/Amazon-pallets-de-devolucion-estados-unidos-1024x576.webp");
            background-size: cover;
            background-position: center;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
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
    <h1>Agregar lote</h1>
  
  <form action="agregar_lote.php" method="POST">
    <label for="ide_lot">ID del lote:</label>
    <input type="text" name="ide_lot" required><br><br>
    
    <label for="fec_fab_lot">Fecha de fabricacion del lote:</label>
    <input type="text" name="fec_fab_lot" required><br><br>
    
    <label for="fec_ven_lot">Fecha de vencimiento del lote:</label>
    <input type="text" name="fec_ven_lot" required><br><br>
    
    
    <input type="submit" value="Agregar Lote">
  </form>
  <a href="../lotes/lotes.html">Volver</a>

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

    $isTouch = isset($_POST["ide_lot"]);
    if ($isTouch){
        $ide_lot = $_POST['ide_lot'];
         // Obtener los valores del formulario
        $ide_lot = $_POST['ide_lot'];
        $fec_fab_lot = $_POST['fec_fab_lot'];
        $fec_ven_lot = $_POST['fec_ven_lot'];
      


        // Insertar el nuevo producto en la base de datos
        $query = "INSERT INTO lotes (ide_lot, fec_fab_lot, fec_ven_lot) VALUES ('$ide_lot', '$fec_fab_lot', '$fec_ven_lot')";

        if (mysqli_query($conexion, $query)) {
            echo "Lote agregado exitosamente.";
        } else {
            echo "Error al agregar el lote: " . mysqli_error($conexion);
            }

    }


    // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    ?>
</body>
</html>