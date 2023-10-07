<?php
include_once('db.php');
$nombre = $_POST['nombre'];
$estado = $_POST['estado'];
$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

$regsitro = "INSERT INTO `vacas` (`nombre_vaca`, `estado`,`foto`) VALUES ('$nombre', '$estado', '$foto')";
$resultadoRegistro = mysqli_query($conexion, $regsitro) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registro nuevo</title>
</head>

<body>
    <div class="container">
        <div class="form">
            <?php echo "<label>Registro exitoso</label>"; ?>
        </div>
        <meta http-equiv="refresh" content="1;url=index.php" />
    </div>
</body>

</html>