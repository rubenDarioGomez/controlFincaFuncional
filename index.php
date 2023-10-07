    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Finca ganadera</title>
    </head>

    <body>
        <main>
            <div class="container">

                <div class="form">

                    <form action="buscar.php" method="post">

                        <fieldset>

                            <legend>Buscar vaca </legend>
                            <select name="nombreVaca" id="nombreVaca">
                                <option value="0">Nombre de la vaca</option>
                                <?php
                                include_once('db.php');

                                $buscar = "SELECT * FROM `vacas` ";
                                $resultadoBuscar = mysqli_query($conexion, $buscar) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);

                                while ($rowTotalBuscar = mysqli_fetch_assoc($resultadoBuscar)) {
                                    echo "<option value = '$rowTotalBuscar[nombre_vaca]'>$rowTotalBuscar[nombre_vaca]</option>";
                                };
                                ?>
                            </select>
                            <Button>Buscar</Button>

                        </fieldset>
                    </form>

                </div>

                <div class="form">
                    <table class="conteo">
                        <caption>En ordeño</caption>

                        <?php
                        $sql = "SELECT COUNT(*) FROM `vacas` WHERE estado = 'en ordeño'";
                        $resul   = mysqli_query($conexion, $sql) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);
                        while ($rowTotal = mysqli_fetch_assoc($resul)) {
                        ?>

                            <thead>
                                <tr>
                                    <th><?php echo $rowTotal['COUNT(*)'] ?></th>
                                </tr>
                            </thead>
                        <?php } ?>
                    </table>

                    <table class="conteo">
                        <caption>Secas</caption>

                        <?php
                        $sql = "SELECT COUNT(*) FROM `vacas` WHERE estado = 'seca'";
                        $resul   = mysqli_query($conexion, $sql) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);
                        while ($rowTotal = mysqli_fetch_assoc($resul)) {
                        ?>

                            <thead>
                                <tr>
                                    <th><?php echo $rowTotal['COUNT(*)'] ?></th>
                                </tr>
                            </thead>
                        <?php } ?>
                    </table>
                </div>

                <div class="form">

                    <table>
                        <caption>lista de vacas en ordeño</caption>

                        <thead>

                            <tr>
                                <th>Nombre</th>
                                <th>Fecha iseminacion</th>
                                <th>Fecha secada</th>
                                <th>Fecha ultimo parto</th>
                            </tr>

                        </thead>

                        <?php
                        $sql = "SELECT * FROM `vacas` WHERE estado = 'en ordeño' ORDER BY `vacas`.`fecha_inseminacion` ASC";
                        $resul   = mysqli_query($conexion, $sql) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);
                        while ($rowTotal = mysqli_fetch_assoc($resul)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $rowTotal['nombre_vaca'] ?></td>
                                    <td><?php echo $rowTotal['fecha_inseminacion'] ?></td>
                                    <td><?php echo $rowTotal['fecha_secado'] ?></td>
                                    <td><?php echo $rowTotal['ultimo_parto'] ?></td>
                                </tr>
                            </tbody>
                        <?php }
                        ?>
                    </table>
                </div>

                <div class="form">
                    <table>
                        <caption>lista de vacas secas</caption>
                        <thead>

                            <tr>
                                <th>Nombre</th>
                                <th>Fecha secada</th>
                                <th>Fecha proximo parto</th>
                                <th>Fecha ultimo parto</th>
                            </tr>

                        </thead>

                        <?php
                        $sql = "SELECT * FROM `vacas` WHERE estado = 'seca' ORDER BY `vacas`.`fecha_parto` ASC";
                        $resul   = mysqli_query($conexion, $sql) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);
                        while ($rowTotal = mysqli_fetch_assoc($resul)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $rowTotal['nombre_vaca'] ?></td>
                                    <td><?php echo $rowTotal['fecha_secado'] ?></td>
                                    <td><?php echo $rowTotal['fecha_parto'] ?></td>
                                    <td><?php echo $rowTotal['ultimo_parto'] ?></td>
                                </tr>
                            </tbody>
                        <?php }
                        ?>
                    </table>
                </div>
                <div class="form">

                    <form action="inseminacion.php" method="post">
                        <fieldset>

                            <legend>Registrar inseminacion</legend>

                            <select name="nombre" id="nombre">
                                <option value="0">Nombre de la vaca</option>
                                <?php
                                include_once('db.php');
                                $buscar = "SELECT * FROM `vacas` ";
                                $resultadoBuscar = mysqli_query($conexion, $buscar) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);

                                while ($rowTotalBuscar = mysqli_fetch_assoc($resultadoBuscar)) {
                                    echo "<option value = '$rowTotalBuscar[id]'>$rowTotalBuscar[nombre_vaca]</option>";
                                };
                                ?>
                            </select>

                            <label for="inseminacion">Fecha de inseminacion
                                <input type="date" name="inseminacion" id="inseminacion">
                            </label>

                            <select name="tipo" id="tipo">
                                <option value="0">Tipo de inseminacion</option>
                                <option value="Inseminacion">Inseminacion</option>
                                <option value="Toro">Toro</option>
                            </select>


                            <button>REGISTRAR</button>
                        </fieldset>
                    </form>
                </div>


                <div class="form">

                    <form action="secar.php" method="post">

                        <fieldset>

                            <legend>Secar Vaca</legend>

                            <select name="nombre" id="nombre">
                                <option value="0">Nombre de la vaca</option>
                                <?php

                                $buscar = "SELECT * FROM `vacas` ";
                                $resultadoBuscar = mysqli_query($conexion, $buscar) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);

                                while ($rowTotalBuscar = mysqli_fetch_assoc($resultadoBuscar)) {
                                    echo "<option value = '$rowTotalBuscar[id]'>$rowTotalBuscar[nombre_vaca]</option>";
                                };
                                ?>
                            </select>

                            <label for="secada">Fecha de secada
                                <input type="date" name="secada" id="secada">
                            </label>

                            <button>Secar</button>

                        </fieldset>
                    </form>

                </div>

                <div class="form">

                    <form action="parto.php" method="post">

                        <fieldset>

                            <legend>Registrar parto</legend>

                            <select name="nombre" id="nombre">
                                <option value="0">Nombre de la vaca</option>
                                <?php

                                $buscar = "SELECT * FROM `vacas` ";
                                $resultadoBuscar = mysqli_query($conexion, $buscar) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);

                                while ($rowTotalBuscar = mysqli_fetch_assoc($resultadoBuscar)) {
                                    echo "<option value = '$rowTotalBuscar[id]'>$rowTotalBuscar[nombre_vaca]</option>";
                                };
                                ?>
                            </select>
                            <label for="parto">Fecha parto
                                <input type="date" name="parto" id="parto">
                            </label>
                            <button>Registrar</button>

                        </fieldset>
                    </form>

                </div>

                <div class="form">

                    <form action="registro.php" method="post" enctype="multipart/form-data">

                        <fieldset>

                            <legend>Registrar vaca nueva</legend>

                            <input type="text" name="nombre" required placeholder="Nombre">
                            <label for="estado">Estado
                                <select name="estado" id="estado">
                                    <option value="seca">Seca</option>
                                    <option value="En ordeño">En ordeño</option>
                                </select>
                            </label>
                            <label for="foto">foto<input type="file" id="foto" name="foto" accept="image/*"></label>

                            <button>Registrar vaca</button>

                        </fieldset>
                    </form>

                </div>

                <div class="form">

                    <form action="eliminar.php" method="post">

                        <fieldset>

                            <legend>Eliminar vaca</legend>

                            <select name="nombre" id="nombre">
                                <option value="0">Nombre de la vaca</option>
                                <?php

                                $buscar = "SELECT * FROM `vacas` ";
                                $resultadoBuscar = mysqli_query($conexion, $buscar) or trigger_error("query failed" . mysqli_error($conexion), E_USER_ERROR);

                                while ($rowTotalBuscar = mysqli_fetch_assoc($resultadoBuscar)) {
                                    echo "<option value = '$rowTotalBuscar[id]'>$rowTotalBuscar[nombre_vaca]</option>";
                                };
                                ?>
                            </select>


                            <button>Eliminar vaca</button>

                        </fieldset>
                    </form>

                </div>

            </div>
        </main>
    </body>

    </html>