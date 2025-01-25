<?php require_once HEADER ?>
<main style="padding: 20px; background-color: #f0f8f0; font-family: Arial, sans-serif;">
    <h1 style="color: #2a4d2a; text-align: center; margin-bottom: 20px;">Listado de Rutas de Recolección</h1>
    <?php if ($tipoDeUsuario === 'Administrador'): ?>
        <div style="text-align: right; margin-bottom: 20px;">
            <a href="index.php?c=Rutas&f=createForm" class="btn" style="text-decoration: none; background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px;">Nueva Ruta</a>
        </div>
    <?php endif; ?>
    <table border="1" style="width: 100%; border-collapse: collapse; background-color: #ffffff; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
        <thead style="background-color: #4CAF50; color: white;">
            <tr>
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Fecha de Recolección</th>
                <th style="padding: 10px;">Hora de Recolección</th>
                <th style="padding: 10px;">Materiales a Recoger</th>
                <th style="padding: 10px;">Empresa Encargada</th>
                <th style="padding: 10px;">Sector Cubierto</th>
                <th style="padding: 10px;">Vehículo Asignado</th>
                <?php if ($tipoDeUsuario === 'Administrador' || $tipoDeUsuario === 'Empresa'): ?>
                    <th style="padding: 10px;">Acciones</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rutas)): ?>
                <?php foreach ($rutas as $ruta): ?>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 10px; text-align: center;"><?php echo $ruta->getId(); ?></td>
                        <td style="padding: 10px; text-align: center;"><?php echo $ruta->getFechaDeRecoleccion(); ?></td>
                        <td style="padding: 10px; text-align: center;"><?php echo $ruta->getHoraDeRecoleccion(); ?></td>
                        <td style="padding: 10px;"><?php echo $ruta->getMaterialesARecoger(); ?></td>
                        <td style="padding: 10px;"><?php echo $ruta->getEmpresaEncargada(); ?></td>
                        <td style="padding: 10px;"><?php echo $ruta->getSectorCubierto(); ?></td>
                        <td style="padding: 10px;"><?php echo $ruta->getVehiculoAsignado(); ?></td>
                        <?php if ($tipoDeUsuario === 'Administrador' || $tipoDeUsuario === 'Empresa'): ?>
                            <td style="padding: 10px; text-align: center;"> 
                                <a href="index.php?c=Rutas&f=editForm&id=<?php echo $ruta->getId(); ?>" style="color: #007bff; text-decoration: none;">Editar</a>
                                &nbsp;|&nbsp;
                                <a href="index.php?c=Rutas&f=delete&id=<?php echo $ruta->getId(); ?>" style="color: #e53935; text-decoration: none;" onclick="return confirm('¿Estás seguro de eliminar esta ruta?')">Eliminar</a>
                            </td>
                        <?php endif; ?>  
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" style="padding: 10px; text-align: center; color: #757575;">No hay rutas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>
<?php require_once FOOTER ?>
