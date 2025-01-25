<?php require_once HEADER; ?>

<main>
    <div class="contenedorform">
        <h1>Editar Empresa</h1>
        <form action="index.php?c=Empresa&f=edit&id=<?php echo $empresa['id'] ?>" method="POST">
            <label for="materiales">Tipo de Materiales:</label>
            <div>
            <?php
            // Obtener los materiales seleccionados
            $materialesSeleccionados = explode(", ", $empresa['tipoDeMaterialSolicitado']);
            ?>
            <label><input type="checkbox" value="Plástico" <?php if(in_array("Plástico", $materialesSeleccionados)) { echo 'checked="checked"'; } ?> name="materiales[]"> Plástico</label>
            <label><input type="checkbox" value="Vidrio" <?php if(in_array("Vidrio", $materialesSeleccionados)) { echo 'checked="checked"'; } ?> name="materiales[]"> Vidrio</label>
            <label><input type="checkbox" value="Metal" <?php if(in_array("Metal", $materialesSeleccionados)) { echo 'checked="checked"'; } ?> name="materiales[]"> Metal</label>
            <label><input type="checkbox" value="Madera" <?php if(in_array("Madera", $materialesSeleccionados)) { echo 'checked="checked"'; } ?> name="materiales[]"> Madera</label>
            <label><input type="checkbox" value="Cartón" <?php if(in_array("Cartón", $materialesSeleccionados)) { echo 'checked="checked"'; } ?> name="materiales[]"> Cartón</label>
            <label><input type="checkbox" value="Papel" <?php if(in_array("Papel", $materialesSeleccionados)) { echo 'checked="checked"'; } ?> name="materiales[]"> Papel</label>
            </div>

            <div>
                <label for="zona">Zona:</label>
                <input type="text" name="zona" value="<?php echo htmlspecialchars($empresa['zonaComunidadConsultada']); ?>" required>
            </div>
            <div>
                <label for="estado">Estado de la Solicitud:</label>
                <select name="estado">
                    <option value="">Selecciones...</option>
                    <option value="Pendiente" <?php echo $empresa['estadoDeLaSolicitud'] === 'Pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                    <option value="Aprobado" <?php echo $empresa['estadoDeLaSolicitud'] === 'Aprobado' ? 'selected' : ''; ?>>Aprobado</option>
                    <option value="Rechazado" <?php echo $empresa['estadoDeLaSolicitud'] === 'Rechazado' ? 'selected' : ''; ?>>Rechazado</option>
                </select>
            </div>
            <div>
                <label for="fecha_recoleccion">Fecha Estimada de Recolección:</label>
                <input type="date" name="fecha_recoleccion" value="<?php echo htmlspecialchars($empresa['fechaEstimadaDeRecoleccion']); ?>" required>
            </div>
            <div>
                <label for="cantidad">Cantidad Requerida:</label>
                <input type="number" name="cantidad" value="<?php echo htmlspecialchars($empresa['cantidadRequerida']); ?>" required>
            </div>
            <button type="submit">Actualizar Empresa</button>
        </form>
    </div>
</main>
<?php require_once FOOTER; ?>
