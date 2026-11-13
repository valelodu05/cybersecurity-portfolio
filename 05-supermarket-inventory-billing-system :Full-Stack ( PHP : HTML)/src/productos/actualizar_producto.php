<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar producto</title>
    <style>
        body {
          font-family: Arial, sans-serif;
            background-image: url("https://static1.ara.cat/clip/cd0cb477-20c6-4c7f-8744-e6dba9ad3be3_16-9-aspect-ratio_default_0.jpg ");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .success-message {
            color: #4caf50;
            margin-top: 10px;
        }

        .error-message {
            color: #f44336;
            margin-top: 10px;
        }
    </style>
</head>
<body> 
  <div class= "container">
<h1>Actualizar Producto</h1>
  
  <form action="actualizar_producto.php" method="POST">
    <label for="ide_pro">ID del producto:</label>
    <input type="text" name="ide_pro" required><br><br>
    
    <label for="nom_pro">Nombre del producto:</label>
    <input type="text" name="nom_pro"><br><br>
    
    <label for="val_ven_pro">Valor de venta:</label>
    <input type="text" name="val_ven_pro"><br><br>
    
    <label for="can_pro">Cantidad:</label>
    <input type="text" name="can_pro"><br><br>
    
    <label for="val_com_pro">Valor de compra:</label>
    <input type="text" name="val_com_pro"><br><br>
    
    <label for="ide_cat">ID de la categoría:</label>
    <input type="text" name="ide_cat"><br><br>
    
    <label for="ide_lot">ID del lote:</label>
    <input type="text" name="ide_lot"><br><br>
    
    <input type="submit" value="Actualizar Producto">
      </div>
  </form>
  <a href="../productos/cproductos.html">Volver</a>

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
    $isTouch = isset($_POST["ide_pro"]);
    if ($isTouch){
        $ide_pro=$_POST["ide_pro"];
           // Obtener los nuevos valores del formulario
        $nom_pro = $_POST['nom_pro'];
        $val_ven_pro = $_POST['val_ven_pro'];
        $can_pro = $_POST['can_pro'];
        $val_com_pro = $_POST['val_com_pro'];
        $ide_cat = $_POST['ide_cat'];
        $ide_lot = $_POST['ide_lot'];

        // Actualizar el producto en la base de datos
        $query = "UPDATE productos SET";

        if (!empty($nom_pro)) {
        $query .= " nom_pro = '$nom_pro',";
        }

        if (!empty($val_ven_pro)) {
        $query .= " val_ven_pro = '$val_ven_pro',";
        }

        if (!empty($can_pro)) {
        $query .= " can_pro = '$can_pro',";
        }

        if (!empty($val_com_pro)) {
        $query .= " val_com_pro = '$val_com_pro',";
        }

        if (!empty($ide_cat)) {
        $query .= " ide_cat = '$ide_cat',";
        }

        if (!empty($ide_lot)) {
        $query .= " ide_lot = '$ide_lot',";
        }

        $query = rtrim($query, ","); // Eliminar la última coma

        $query .= " WHERE ide_pro = '$ide_pro'";

        if (mysqli_query($conexion, $query)) {
        echo "Producto actualizado exitosamente.";
        } else {
        echo "Error al actualizar el producto: " . mysqli_error($conexion);
        }

    }
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

?>

</body>
</html>