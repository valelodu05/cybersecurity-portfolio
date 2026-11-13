<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Agregar producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("https://images.hola.com/imagenes/estar-bien/20180629125821/el-significado-de-los-colores-de-las-frutas-cs/0-577-509/frutascolores-t.jpg?tx=w_680");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #fff;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
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
    <h1>Agregar Producto</h1>
  
  <form action="agregar_producto.php" method="POST">
    <label for="nom_pro">Nombre del producto:</label>
    <input type="text" name="nom_pro" required><br><br>
    
    <label for="ide_pro">ID del producto:</label>
    <input type="text" name="ide_pro" required><br><br>
    
    <label for="val_ven_pro">Valor de venta:</label>
    <input type="text" name="val_ven_pro" required><br><br>
    
    <label for="can_pro">Cantidad:</label>
    <input type="text" name="can_pro" required><br><br>
    
    <label for="val_com_pro">Valor de compra:</label>
    <input type="text" name="val_com_pro" required><br><br>
    
    <label for="ide_cat">ID de la categoría:</label>
    <input type="text" name="ide_cat" required><br><br>
    
    <label for="ide_lot">ID del lote:</label>
    <input type="text" name="ide_lot" required><br><br>
    
    <input type="submit" value="Agregar Producto">
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

    $isTouch = isset($_POST["ide_pro"]);
    if ($isTouch){
        $ide_pro = $_POST['ide_pro'];
         // Obtener los valores del formulario
        $nom_pro = $_POST['nom_pro'];
        $val_ven_pro = $_POST['val_ven_pro'];
        $can_pro = $_POST['can_pro'];
        $val_com_pro = $_POST['val_com_pro'];
        $ide_cat = $_POST['ide_cat'];
        $ide_lot = $_POST['ide_lot'];


        // Insertar el nuevo producto en la base de datos
        $query = "INSERT INTO productos (nom_pro, ide_pro, val_ven_pro, can_pro, val_com_pro, ide_cat, ide_lot) VALUES ('$nom_pro', '$ide_pro', '$val_ven_pro', '$can_pro', '$val_com_pro', '$ide_cat', '$ide_lot')";

        if (mysqli_query($conexion, $query)) {
            echo "Producto agregado exitosamente.";
        } else {
            echo "Error al agregar el producto: " . mysqli_error($conexion);
            }

    }


    // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    ?>
</body>
</html>