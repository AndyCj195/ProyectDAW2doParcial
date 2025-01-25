<div class="container">
    <h2><?php echo 'Gestión de Materiales'; ?></h2>
    <div class="row">
        <!-- Formulario de búsqueda -->
        <div class="col-sm-6">
            <form action="index.php?c=MaterialesController&f=search" method="GET">
                <input 
                    type="text" 
                    name="search" 
                    id="busqueda" 
                    placeholder="Buscar..." 
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" 
                />
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </form>
        </div>

        <!-- Botón para añadir nuevo -->
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=Materiales&f=view_new">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nuevo
                </button>
            </a>
        </div>
    </div>

    <!-- Tabla de resultados -->
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Tipo de Materiales</th>
                    <th>Cantidad Total (Kg)</th>
                    <th>Estado del Material</th>
                    <th>Comunidad/Zona Asociada</th>
                    <th>Empresa Asignada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="tabladatos">
                <?php if (!empty($resultados)) { ?>
                    <?php foreach ($resultados as $fila) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($fila->getTipoDeMateriales()); ?></td>
                            <td><?php echo htmlspecialchars($fila->getCantidadTotalKg()); ?></td>
                            <td><?php echo htmlspecialchars($fila->getEstadoDelMaterial()); ?></td>
                            <td><?php echo htmlspecialchars($fila->getComunidadZonaAsociada()); ?></td>
                            <td><?php echo htmlspecialchars($fila->getEmpresaAsignada()); ?></td>
                            <td>
                                <a class="btn btn-primary" 
                                   href="index.php?c=MaterialesController&f=view_edit&id=<?php echo $fila->getId(); ?>">
                                    Editar
                                </a>
                                <a class="btn btn-danger" 
                                   onclick="return confirm('¿Está seguro de eliminar este material?');" 
                                   href="index.php?c=MaterialesController&f=delete&id=<?php echo $fila->getId(); ?>">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <!-- Mostrar mensaje si no hay resultados -->
                    <tr>
                        <td colspan="6" class="text-center">No se encontraron resultados.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
