<!--autor:Arroba Carrillo Omar Andrés-->

<?php require_once HEADER; ?>

<div id="principal">
    <?php
        if ($_SESSION['tipoDeUsuario'] === 'Administrador') {
            echo '<h2>Gestión de Materiales</h2>';
        } else {
            echo '<h2>Lista de Materiales Gestionados</h2>';
        }
    ?>

    <?php if ($_SESSION['tipoDeUsuario'] === 'Administrador') { ?>
        <div class="row" style="padding: 30px; display: flex; flex-direction: column; align-items: flex-start;">
            <span style="font-weight: bold;">Realizar un nuevo registro: </span>
            <a href="index.php?c=Materiales&f=view_new">
                <button type="button" class="btn btn-light">Nuevo</button>
            </a>
        </div>
    <?php } ?>

    <form id="searchForm" method="POST" action="index.php?c=Materiales&f=search" style="margin-bottom: 20px;">
        <input type="text" id="searchText" name="b" placeholder="Buscar por tipo de material" 
               value="<?= htmlentities($_POST['b'] ?? '') ?>" />
        <select id="estadoSelect" name="estadoDelMaterial">
            <option value="">-- Seleccionar estado --</option>
            <option value="Procesado" <?= ($_POST['estadoDelMaterial'] ?? '') === 'Procesado' ? 'selected' : '' ?>>Procesado</option>
            <option value="Disponible" <?= ($_POST['estadoDelMaterial'] ?? '') === 'Disponible' ? 'selected' : '' ?>>Disponible</option>
            <option value="No disponible" <?= ($_POST['estadoDelMaterial'] ?? '') === 'No disponible' ? 'selected' : '' ?>>No Disponible</option>
        </select>
        <button type="submit" class="btn btn-primary">Buscar</button>
        <button type="button" class="btn btn-secondary" onclick="resetForm()">Refrescar</button>
    </form>

    <!-- Tabla de resultados -->
    <div id="contenedor-maestra">
        <table class="tabla" style="border-collapse: collapse; width: 100%;">
            <thead style="background-color: green; color: white; font-weight: bold;">
                <tr style="border: 2px solid black;">
                    <th>Tipo de Materiales</th>
                    <th>Cantidad Total (Kg)</th>
                    <th>Estado del Material</th>
                    <th>Comunidad/Zona Asociada</th>
                    <th>Empresa Asignada</th>
                    <!-- Mostrar columna "Acciones" solo para administradores -->
                    <?php if ($_SESSION['tipoDeUsuario'] === 'Administrador') { ?>
                        <th>Acciones</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody class="tabladatos">
                <?php if (!empty($resultados)) { ?>
                    <?php foreach ($resultados as $fila) { ?>
                        <tr style="border: 2px solid black;">
                            <td style="border: 1px solid black;"><?php echo htmlspecialchars($fila->getTipoDeMateriales()); ?></td>
                            <td style="border: 1px solid black;"><?php echo htmlspecialchars($fila->getCantidadTotalKg()); ?></td>
                            <td style="border: 1px solid black;"><?php echo htmlspecialchars($fila->getEstadoDelMaterial()); ?></td>
                            <td style="border: 1px solid black;"><?php echo htmlspecialchars($fila->getComunidadZonaAsociada()); ?></td>
                            <td style="border: 1px solid black;"><?php echo htmlspecialchars($fila->getEmpresaAsignada()); ?></td>
                            <?php if ($_SESSION['tipoDeUsuario'] === 'Administrador') { ?>
                                <td style="border: 1px solid black;">
                                    <a class="btn btn-primary" 
                                       href="index.php?c=Materiales&f=view_edit&id=<?php echo $fila->getId(); ?>">
                                       Editar
                                    </a>
                                    <a class="btn btn-danger" 
                                       onclick="return confirm('¿Está seguro de eliminar este material?');" 
                                       href="index.php?c=Materiales&f=delete&id=<?php echo $fila->getId(); ?>">
                                       Eliminar
                                    </a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <!-- Mostrar mensaje si no hay resultados -->
                    <tr>
                        <td colspan="<?php echo ($_SESSION['tipoDeUsuario'] === 'Administrador') ? 6 : 5; ?>" class="text-center">
                            No se encontraron resultados.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function resetForm() {
        // Borrar los campos
        document.getElementById('searchText').value = '';
        document.getElementById('estadoSelect').value = '';
        
        // Realizar la búsqueda
        document.getElementById('searchForm').submit();
    }
</script>

<?php require_once FOOTER; ?>
