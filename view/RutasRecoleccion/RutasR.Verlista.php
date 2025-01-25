<?php require_once HEADER ?>
    <main>
    <h1>Listado de Rutas de Recolección</h1>
    <?php if ($tipoDeUsuario === 'Administrador'): ?>
    <a href="index.php?c=Rutas&f=createForm" class="btn">Nueva Ruta</a>
        <?php endif; ?>    
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
                        <?php if ($tipoDeUsuario === 'Administrador'): ?>
                        <td> 
                            <a href="index.php?c=Rutas&f=editForm&id=<?php echo $ruta->getId(); ?>">Editar</a>
                            <a href="index.php?c=Rutas&f=delete&id=<?php echo $ruta->getId(); ?>" onclick="return confirm('¿Estás seguro de eliminar esta ruta?')">Eliminar</a>
                        </td>
                        <?php endif; ?>  
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No hay rutas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>
<?php require_once FOOTER ?>