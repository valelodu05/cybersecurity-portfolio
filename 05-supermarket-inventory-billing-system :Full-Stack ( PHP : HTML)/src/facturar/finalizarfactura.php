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
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td, table th {
            padding: 8px;
            border: 1px solid #ccc;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
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

    <h2>Facturas</h2>
    <br>
    <form action="finalizarfactura.php" method="post">
        <table>
            <tr>
                <td><b>Numero</b></td>
                <td><b>Fecha</b></td>
                <td><b>Cliente</b></td>
                <td><b>Total a pagar</b></td>
                <td><b>Vendedor</b></td>
            </tr>
            <?php
                $consulta = "SELECT * FROM facturar ORDER BY nro_fac DESC";
                $ejecutar = mysqli_query($conexion,$consulta);
                $i=0;
                while($fila = mysqli_fetch_assoc($ejecutar)){
                    $idf = $fila['nro_fac'];
                    $fechaf= $fila['fec_fac'];
                    $totalf = $fila['val_tot_fac'];
                    $idemplef = $fila['ide_ven'];
                    $idcli = $fila['ide_cli'];
                    $i++;
            ?>
            <tr>
                <td><?php echo $idf;?></td>
                <td><?php echo $fechaf;?></td>
                <td><?php
                    $sub_con1 = "SELECT nom_cli FROM clientes WHERE ide_cli=".$idcli;
                    $execute = mysqli_query($conexion,$sub_con1);
                    $dto = mysqli_fetch_assoc($execute);
                    if(!$dto){
                        echo 'Cliente';
                    }else{
                        echo $dto['nom_cli'];
                    }
                    
                ?></td>
                <td><?php echo $totalf;?></td>
                <td><?php
                    $sub_con2 = "SELECT nom_ven FROM vendedor WHERE ide_ven=".$idemplef;
                    $execute = mysqli_query($conexion,$sub_con2);
                    $vendedor = mysqli_fetch_assoc($execute);
                    if(!$vendedor){
                        echo 'Vendedor';
                    }else{
                        echo $vendedor['nom_ven'];
                    }

                    
                ?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </form> 
    <a href="../facturar/facturar.html">Volver</a> 
</div>
</body>
</html>