<div class="container">
    <h2><?php echo 'Gestión de Materiales'; ?></h2>
    <div class="row">
        <!-- Formulario de búsqueda -->
        <div class="col-sm-6">
            <form action="index.php?c=gestionmateriales&f=search" method="GET">
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
            <a href="index.php?c=gestionmateriales&f=view_new">
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
                            <td><?php echo htmlspecialchars($fila['tipoDeMateriales']); ?></td>
                            <td><?php echo htmlspecialchars($fila['cantidadTotalKg']); ?></td>
                            <td><?php echo htmlspecialchars($fila['estadoDelMaterial']); ?></td>
                            <td><?php echo htmlspecialchars($fila['comunidadZonaAsociada']); ?></td>
                            <td><?php echo htmlspecialchars($fila['empresaAsignada']); ?></td>
                            <td>
                                <a class="btn btn-primary" 
                                   href="index.php?c=gestionmateriales&f=view_edit&id=<?php echo $fila['id']; ?>">
                                    Editar
                                </a>
                                <a class="btn btn-danger" 
                                   onclick="return confirm('¿Está seguro de eliminar este material?');" 
                                   href="index.php?c=gestionmateriales&f=delete&id=<?php echo $fila['id']; ?>">
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
