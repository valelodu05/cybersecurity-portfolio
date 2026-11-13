<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
</head>
<body>
<?php
    // Realizar la conexión a la base de datos
    $host = "190.15.16.205"; // Cambiar por el nombre de tu host de la base de datos
    $usuario = "natalia"; // Cambiar por el nombre de usuario de la base de datos
    $contraseña = "natalia23"; // Cambiar por la contraseña de la base de datos
    $base_de_datos = "supermercado"; // Cambiar por el nombre de la base de datos

    $conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);
?>
    <h2>Facturacion "Factura"</h2>
    <br>
    <a class="btn btn-primary" href="./clientes/registrar_cliente.php"> + Nuevo cliente </a>
    <br> <br>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="txtid" value="<?php echo $ide_cli;?>">
        
        <p>
            Numero de factura:
            <input type="text" name="nrofac" required>
            <br>
        </p>
        

        <p>
            Fecha de facturación:
            <input type="date" name="txtfecha" required>
            <br>
        </p>

        <p>
            Atendido Por:
            <select name="vendedor">
                <?php 
                $consulta = "SELECT * FROM vendedor";
                $ejecutar = mysqli_query($conexion,$consulta);
                while($res = mysqli_fetch_assoc($ejecutar)){
                    echo "<option value =".$res['ide_ven'].">".$res['nom_ven']."</option>";
                }
                ?>
            </select>
        </p>
        <p>
            Cliente:
            <select name="cliente">
                <?php 
                $consulta1 = "SELECT * FROM clientes";
                $ejecutar1 = mysqli_query($conexion,$consulta1);
                while($res = mysqli_fetch_assoc($ejecutar1)){
                    echo "<option value =".$res['ide_cli'].">".$res['nom_cli']."</option>";
                }
                ?>
            </select>
        </p>
        <div class="modal-footer">
            <input type="submit" name="insertar" value="Insertar Datos">
        </div>
        <?php 
            if(isset($_POST['insertar'])){
                $emple = $_POST['vendedor'];
                $fecha = $_POST['txtfecha'];
                $cliente = $_POST['cliente'];
                $facnro = $_POST['nrofac'];

                $sql = "INSERT INTO facturar(nro_fac, fec_fac,val_tot_fac,ide_ven,ide_cli) VALUES('$facnro','$fecha',0,$emple,$cliente)";
                $ejecutar = mysqli_query($conexion,$sql) or die (mysqli_error($conexion));

                $id_pac = mysqli_insert_id($conexion);

                echo "<script>alert('Datos insertados')</script>";
            }
        ?>
        <a href="../facturar/detallefactura.php?facturar=<?php echo $facnro;?>">Facturar</a>
    </form>
</div>
</body>
</html>