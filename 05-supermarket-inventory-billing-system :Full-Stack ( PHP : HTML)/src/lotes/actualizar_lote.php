
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar lote</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://www.esan.edu.pe/images/blog/2017/10/23/1500x844-lotes.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;

        }

        h1 {
            color: white;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: inline-block; /* Para que el formulario esté centrado horizontalmente */
            text-align: left; /* Alinear el contenido del formulario a la izquierda */
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .success-message {
            color: #4CAF50;
            margin-top: 10px;
        }

        .error-message {
            color: #f44336;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<h1>Actualizar lote</h1>
  
  <form action="actualizar_lote.php" method="POST">
    <label for="ide_lot">ID del lote:</label>
    <input type="text" name="ide_lot" required><br><br>
    
    <label for="fec_fab_lot">Fecha de fabricacion del lote:</label>
    <input type="text" name="fec_fab_lot"><br><br>
    
    <label for="fec_ven_lot">Fecha de vencimiento del lote:</label>
    <input type="text" name="fec_ven_lot"><br><br>
    
    
    <input type="submit" value="Actualizar Lote">
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
    // Obtener el ID del producto a actualizar
    $isTouch = isset($_POST["ide_lot"]);
    if ($isTouch){
        $ide_lot=$_POST["ide_lot"];
           // Obtener los nuevos valores del formulario
        $ide_lot = $_POST['ide_lot'];
        $fec_fab_lot = $_POST['fec_fab_lot'];
        $fec_ven_lot = $_POST['fec_ven_lot'];


        // Actualizar el producto en la base de datos
        $query = "UPDATE lotes SET";

        if (!empty($ide_lot)) {
        $query .= " ide_lot = '$ide_lot',";
        }

        if (!empty($fec_fab_lot)) {
        $query .= " fec_fab_lot = '$fec_fab_lot',";
        }

        if (!empty($fec_ven_lot)) {
        $query .= " fec_ven_lot = '$fec_ven_lot',";
        }

        

        $query = rtrim($query, ","); // Eliminar la última coma

        $query .= " WHERE ide_lot = '$ide_lot'";

        if (mysqli_query($conexion, $query)) {
        echo "Lote actualizado exitosamente.";
        } else {
        echo "Error al actualizar el lote: " . mysqli_error($conexion);
        }

    }
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

?>

</body>
</html>