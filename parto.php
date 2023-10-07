<?php
include_once('db.php');
$nombre = $_POST['nombre'];
$parto = $_POST['parto'];

$sql = "UPDATE `vacas` SET `ultimo_parto` = '$parto', `estado` = 'En ordeño'  WHERE `vacas`.`id` = '$nombre'";
$resultadoParto = mysqli_query($conexion, $sql) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registro de parto</title>
</head>

<body>
    <div class="container">
        <div class="form">
            <?php echo "<label>Registro exitoso</label>"; ?>
            <meta http-equiv="refresh" content="1;url=index.php" />
        </div>
    </div>
</body>

</html>