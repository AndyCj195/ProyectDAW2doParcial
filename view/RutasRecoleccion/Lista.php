<?php
// Archivo: view/RutasRecoleccion/index.php
// Llama al controlador para obtener todas las rutas
require_once 'controller/RutasController.php';

$rutasController = new RutasController();
$rutas = $RutasController->index(); // Obtener las rutas desde el controlador
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Listado de Rutas de Recolección</title>
</head>
<body>
    <h1>Listado de Rutas de Recolección</h1>
    <a href="index.php?c=Rutas&f=createForm" class="btn">Nueva Ruta</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de Recolección</th>
                <th>Hora de Recolección</th>
                <th>Materiales a Recoger</th>
                <th>Empresa Encargada</th>
                <th>Sector Cubierto</th>
                <th>Vehículo Asignado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rutas)): ?>
                <?php foreach ($rutas as $ruta): ?>
                    <tr>
                        <td><?php echo $ruta->getId(); ?></td>
                        <td><?php echo $ruta->getFechaDeRecoleccion(); ?></td>
                        <td><?php echo $ruta->getHoraDeRecoleccion(); ?></td>
                        <td><?php echo $ruta->getMaterialesARecoger(); ?></td>
                        <td><?php echo $ruta->getEmpresaEncargada(); ?></td>
                        <td><?php echo $ruta->getSectorCubierto(); ?></td>
                        <td><?php echo $ruta->getVehiculoAsignado(); ?></td>
                        <td>
                            <a href="index.php?c=Rutas&f=editForm&id=<?php echo $ruta->getId(); ?>">Editar</a>
                            <a href="index.php?c=Rutas&f=delete&id=<?php echo $ruta->getId(); ?>" onclick="return confirm('¿Estás seguro de eliminar esta ruta?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No hay rutas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
