<?php
// Archivo: view/RutasRecoleccion/edit.php
// Llama al controlador para obtener la ruta específica
require_once 'controller/RutasController.php';

$rutasController = new RutasController();
$ruta = $RutasController->editForm($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/forms.css">
    <title>Editar Ruta</title>
</head>
<body>
    <h1>Editar Ruta de Recolección</h1>
    <form action="index.php?c=Rutas&f=update" method="POST">
        <input type="hidden" name="id" value="<?php echo $ruta->getId(); ?>">

        <label for="FechaDeRecoleccion">Fecha de Recolección:</label>
        <input type="date" name="FechaDeRecoleccion" id="FechaDeRecoleccion" value="<?php echo $ruta->getFechaDeRecoleccion(); ?>" required><br>

        <label for="HoraDeRecoleccion">Hora de Recolección:</label>
        <input type="time" name="HoraDeRecoleccion" id="HoraDeRecoleccion" value="<?php echo $ruta->getHoraDeRecoleccion(); ?>" required><br>

        <label for="materialesARecoger">Materiales a Recoger:</label>
        <textarea name="materialesARecoger" id="materialesARecoger" required><?php echo $ruta->getMaterialesARecoger(); ?></textarea><br>

        <label for="EmpresaEncargada">Empresa Encargada:</label>
        <input type="text" name="EmpresaEncargada" id="EmpresaEncargada" value="<?php echo $ruta->getEmpresaEncargada(); ?>" required><br>

        <label for="SectorCubierto">Sector Cubierto:</label>
        <input type="text" name="SectorCubierto" id="SectorCubierto" value="<?php echo $ruta->getSectorCubierto(); ?>" required><br>

        <label for="VehiculoAsignado">Vehículo Asignado:</label>
        <input type="text" name="VehiculoAsignado" id="VehiculoAsignado" value="<?php echo $ruta->getVehiculoAsignado(); ?>"><br>

        <button type="submit" class="btn">Actualizar</button>
    </form>
</body>
</html>
