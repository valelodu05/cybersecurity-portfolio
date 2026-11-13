<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table td, table th {
            padding: 10px;
            border: 1px solid #ccc;
        }

        table tr:first-child {
            background-color: #f2f2f2;
        }

        .nodal-footer {
            margin-top: 20px;
        }

        .nodal-footer input[type="submit"],
        .nodal-footer input[type="button"] {
            padding: 10px 20px;
            border: none;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            margin-right: 10px;
        }

        .nodal-footer input[type="submit"]:hover,
        .nodal-footer input[type="button"]:hover {
            background-color: #555;
        }

        a {
            display: block;
            margin-top: 20px;
            color: #333;
            text-decoration: none;
        }
    </style>
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
    <h2>Facturar - Detalle Factura</h2>
    <br>
    <form action="" method="POST" enctype="multipart/form-data">
        <br>
        <?php
            if(isset($_GET['facturar'])){
                $id_generarfactura = $_GET['facturar'];
                $consultargenfac = "SELECT * FROM facturar WHERE nro_fac = $id_generarfactura";
                $executegenfac = mysqli_query($conexion,$consultargenfac);
                $fila = mysqli_fetch_assoc($executegenfac);

                $id_pac = $fila['nro_fac'];

            }
        ?>
        <p>
            Producto:
            <select name="select_pro">
                <option value="0">
                    ------
                </option>
                    <?php
                    $consulta2 = "SELECT * FROM productos";
                    $ejecutar2 = mysqli_query($conexion,$consulta2);
                    while($respuesta2=mysqli_fetch_assoc($ejecutar2)){
                        echo "<option value=".$respuesta2['ide_pro'].">".$respuesta2['nom_pro']."</option>";
                    }
                    ?>
            </select>
            <br>
            <p>
                Cantidad:
                <input type="number" name="txtcantidad">
                <br>
                <br>
                <input type="submit" name="inserttra" value="Agregar producto">
            </p>
        </p>
        <!-- INSERTAR DATAOS EN DETALLE FACTURA TEMPORAL -->
        <?php
            if(isset($_POST['inserttra'])){
                $idpro = $_POST['select_pro'];
                $cant = $_POST['txtcantidad'];

                $consulta2="SELECT val_ven_pro FROM productos WHERE ide_pro = '$idpro'";
                $ejecutar2=mysqli_query($conexion,$consulta2);
                $res = mysqli_fetch_assoc($ejecutar2);
                $preU = $res['val_ven_pro'];
                $valtol = $preU*$cant;


                $consulta3="SELECT MAX(nro_fac) As FAC FROM facturar";
                $ejecutar3=mysqli_query($conexion,$consulta3);
                $res2 = mysqli_fetch_assoc($ejecutar3);
                $idfac = $res2['FAC'];

                $sql = "INSERT INTO detalles(cant_det,val_ind,val_tot,nro_fac,ide_pro) VALUES($cant,$preU,$valtol,$idfac,$idpro)";
                $ejecutar = mysqli_query($conexion,$sql);
            }
        ?>
        <h2>Productos Agregados</h2>
        <br> <br>
        <table>
            <tr style="text-aling: center;">
                <td>Item</td>
                <td>Producto</td>
                <td>Cantidad</td>
                <td>Precio unitario</td>
                <td>Total</td>
                <td>Accion</td>
            </tr>
            <?php
                $suma = 0;
                $consulta="SELECT * FROM detalles";
                $ejecutar=mysqli_query($conexion,$consulta);
                $i=0;

                while($fila = mysqli_fetch_assoc($ejecutar)){
                    $iddft = $fila['nro_fac'];
                    $idpro = $fila['ide_pro'];
                    $cantidad = $fila['cant_det'];
                    $precioU = $fila['val_ind'];
                    $totaldt = $fila['val_tot'];
                    $i++;
            ?>
            <tr>
                <td align="center"><?php echo $iddft;?></td>
                <td>
                    <?php
                        $sub_sql_2 = "SELECT nom_pro FROM productos WHERE ide_pro= '$idpro'";
                        $execute = mysqli_query($conexion,$sub_sql_2);
                        $tratventa=mysqli_fetch_assoc($execute);
                        echo $tratventa['nom_pro'];
                    ?>
                </td>
                <td><?php echo $cantidad;?></td>
                <td><?php echo $precioU;?></td>
                <td><?php echo $totaldt;?></td>
                <td>
                    <a onClick="javascript: return confirm('¿Estas segur@ que deseas eiminar este tratamiento?');" href="detallefactura.php?eliminar=<?php echo $iddft;?>">Eliminar</a>
                </td>
                <?php
                    if(isset($_GET['eliminar'])){
                    $borrar_id = $_GET['eliminar'];
                    $eliminar = "DELETE FROM detalles WHERE nro_fac = '$borrar_id'";
                    $ejecutar=mysqli_query($conexion,$eliminar) or die (mysqli_error($conexion));

                        if($ejecutar){
                            echo '<script type="text/javascript">alert("Producto Eliminado Correctamente");</script>';
                            echo '<script type="text/javascript">window.open("detallefactura.php","_SELF");</script>';
                        }else{
                            echo '<script type="text/javascript">alert("Producto no Eliminado, esta relacionado con otro registro");</script>';
                            echo '<script type="text/javascript">window.open("detallefactura.php","_SELF");</script>';
                        }
                    }
                ?>
            </tr>
            <?php 
                $suma = $suma + $totaldt;
                }
            ?>
                <tr>
                    <td colspan="6">  </td>
                </tr>
                <tr>
                    <td colspan="4" align="center">Total Factura</td>
                    <td colspan="2"><?php echo $suma;?></td>
                </tr>
        </table>
    </form>
    <form action="detallefactura.php" method="POST">
        <div class="nodal-footer">
            <input type="hidden" name="nro_fac" value="<?php $nro_fac?>">
            <input type="submit" name="txtfinalizar" value="Finalizar Factura">
            <input type="button" value="Cancelar Factura" onclick="location='../clientes/consultar_cliente.php'">
        </div>
        <?php
            if(isset($_GET['facturar'])){
                $id_generarfactura = $_GET['facturar'];
                $consultargenfac = "SELECT * FROM facturar WHERE nro_fac = $id_generarfactura";
                $executegenfac = mysqli_query($conexion,$consultargenfac);
                $fila = mysqli_fetch_assoc($executegenfac);


            }
        ?>

        <?php
            if(isset($_POST['txtfinalizar'])){
                $id_pac = $_POST['nro_fac'];

                $sumatotal = "SELECT SUM(val_tot) As TOTALFACTURA FROM detalles WHERE nro_fac ='".$id_pac."'";
                $ejecutarsumatotal = mysqli_query($conexion,$sumatotal) or die (mysqli_error($conexion));
                $grantotal = mysqli_fetch_assoc($ejecutarsumatotal);
                $consulta2 = $grantotal['TOTALFACTURA'];
                echo "$consulta2";

                $updatefin = "UPDATE facturar SET val_tot_fac = 24 WHERE nro_fac = '444444'";
                $ejecutarupdate = mysqli_query($conexion,$updatefin) or die (mysqli_error($conexion));

                $eliminacionfinal = "DELETE FROM detalles";
                $executedelete = mysqli_query($conexion,$eliminacionfinal) or die (mysqli_error($conexion));
                echo '<script type="text/javascript">alert("Factura realizada correctamente Correctamente");</script>';
                echo '<script type="text/javascript">window.open("finalizarfactura.php","_SELF");</script>';
            }
        ?>

    </form>
    <a href="../facturar/facturar.html">Volver</a>
</div>
</body>
</html>