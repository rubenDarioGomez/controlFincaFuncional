<?php
include_once('db.php');
$nombre = $_POST['nombre'];
$inseminacion = $_POST['inseminacion'];
$secada = date("Y-m-d", strtotime($inseminacion . "+ 7 month "));
$parto = date("Y-m-d", strtotime($inseminacion . "+ 9 month "));
$tipo = $_POST['tipo'];


$sql = "UPDATE `vacas` SET `fecha_inseminacion` = '$inseminacion', `fecha_secado` = '$secada', `fecha_parto` = '$parto' WHERE `vacas`.`id` = '$nombre'";
$resultadoInseminacion = mysqli_query($conexion, $sql) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);

$sql2 = "UPDATE `vacas` SET `tipo_inseminacion` = 'toro' WHERE `vacas`.`id` = '$nombre'";
$resultadoInseminacion2 = mysqli_query($conexion, $sql2) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registro inseminacion</title>
</head>

<body>
    <div class="container">
        <div class="form">
            <?php
            echo "<label>inseminacion registrada</label><br>";
            ?>
            <meta http-equiv="refresh" content="1;url=index.php" />
        </div>
    </div>
</body>

</html>