<?php
include_once('db.php');
$nombre = $_POST['nombreVaca'];
$buscar = "SELECT * FROM `vacas` WHERE  `nombre_vaca` = '$nombre' ";
$resultadoBuscar = mysqli_query($conexion, $buscar) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Informacion general</title>
</head>

<body>
    <a href="index.php"><Button class="regresar">Regresar</Button></a>

    <table border="3" style="border-collapse: separate;">
        <caption>Informacion general</caption>
        <thead>

            <tr>
                <th>Numero</th>
                <th>Nombre</th>
            </tr>

        </thead>

        <?php
        while ($rowTotal = mysqli_fetch_assoc($resultadoBuscar)) {
        ?>
            <tbody>
                <tr>
                    <th><?php echo $rowTotal['id']; ?></th>
                    <th><?php echo $rowTotal['nombre_vaca']; ?></th>
                </tr>

                <tr>
                    <td colspan="2">

                        <?php
                        if ($rowTotal['foto'] != NULL) {
                        ?>
                            <img src="data:image/jpg;base64, <?php echo base64_encode($rowTotal['foto']); ?>" alt="imagen de la vaca">
                        <?php
                        } else {
                            echo "<div class='addImg'> <a href='formImg.php'>Agregar imagen</a></div>";
                        }
                        ?>

                    </td>
                </tr>

            </tbody>

            <thead>
                <tr>
                    <th>Fecha inseminacion</th>
                    <th>Tipo de inseminacion</th>

                </tr>
            </thead>

            <tbody>
                <tr>
                    <th ><?php echo $rowTotal['fecha_inseminacion'] ?></th>
                    <th ><?php echo $rowTotal['tipo_inseminacion'] ?></th>
                </tr>
                <thead>
                    <tr>
                        <th>Fecha de secado</th>
                        <th>Fecha de parto</th>

                    </tr>
                </thead>
            <tbody>
                <tr>
                    <th><?php echo $rowTotal['fecha_secado'] ?></th>
                    <th><?php echo $rowTotal['fecha_parto'] ?></th>

                </tr>

                <thead>
                    <tr>
                        <th>Fecha ultimo parto</th>
                        <th>Estado</th>
                    </tr>
                </thead>
            <tbody>
                <tr>
                    <th><?php echo $rowTotal['ultimo_parto'] ?></th>
                    <th><?php echo $rowTotal['estado'] ?></th>

                </tr>
            </tbody>
        <?php
        }

        ?>
    </table>
</body>

</html>