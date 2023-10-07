<?php
include_once('db.php');
$nombre = $_POST['nombre'];
$fecha = $_POST['secada'];
$parto = date("Y-m-d", strtotime($fecha . "+ 2 month "));


$cambiar = "UPDATE `vacas` SET `estado` = 'Seca', `fecha_secado` = '$fecha', `fecha_parto` = '$parto' WHERE `vacas`.`id` = '$nombre'";
$resultadoEstado = mysqli_query($conexion, $cambiar) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modificacion de estado</title>
</head>

<body>
    <div class="container">
        <div class="form">
            <?php
            echo "<label>Estado modificado</label>";
            ?>
            <meta http-equiv="refresh" content="1;url=index.php" />
        </div>
    </div>
</body>

</html>