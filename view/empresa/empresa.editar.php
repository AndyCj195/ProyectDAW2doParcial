<?php require_once HEADER; ?>
<link rel="stylesheet" href="assets/css/styleForm.css">
<main>
    <div id="main-div" style="margin-top: 20px;">
        <div id="formulario" class="form-edit">
            <div class="titulo">
                <h1>Editar Empresa</h1>
            </div>
            <form action="index.php?c=Empresa&f=edit&id=<?php echo $empresa->getId(); ?>" method="POST">
                <div class="form-row">
                    <div class="seccion">
                        <label for="materiales">Tipo de Material Solicitado:</label>
                        <?php
                        // Obtener los materiales seleccionados
                        $materialesSeleccionados = explode(", ", $empresa->getTipoDeMaterialSolicitado());
                        ?>
                        <label><input type="checkbox" value="Plástico" <?php if (in_array("Plástico", $materialesSeleccionados)) echo 'checked'; ?> name="materiales[]"> Plástico</label>
                        <label><input type="checkbox" value="Vidrio" <?php if (in_array("Vidrio", $materialesSeleccionados)) echo 'checked'; ?> name="materiales[]"> Vidrio</label>
                        <label><input type="checkbox" value="Metal" <?php if (in_array("Metal", $materialesSeleccionados)) echo 'checked'; ?> name="materiales[]"> Metal</label>
                        <label><input type="checkbox" value="Madera" <?php if (in_array("Madera", $materialesSeleccionados)) echo 'checked'; ?> name="materiales[]"> Madera</label>
                        <label><input type="checkbox" value="Cartón" <?php if (in_array("Cartón", $materialesSeleccionados)) echo 'checked'; ?> name="materiales[]"> Cartón</label>
                        <label><input type="checkbox" value="Papel" <?php if (in_array("Papel", $materialesSeleccionados)) echo 'checked'; ?> name="materiales[]"> Papel</label>
                    </div>

                    <div class="seccion" style="display: block;">
                        <label for="zona">Zona:</label>
                        <input type="text" name="zona" value="<?php echo htmlspecialchars($empresa->getZonaComunidadConsultada()); ?>" required>
                    </div>
                    <div class="seccion" style="display: block;">
                        <label for="estado">Estado de la Solicitud:</label>
                        <select name="estado">
                            <option value="">Selecciones...</option>
                            <option value="Pendiente" <?php echo $empresa->getEstadoDeLaSolicitud() === 'Pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                            <option value="Aprobado" <?php echo $empresa->getEstadoDeLaSolicitud() === 'Aprobado' ? 'selected' : ''; ?>>Aprobado</option>
                            <option value="Rechazado" <?php echo $empresa->getEstadoDeLaSolicitud() === 'Rechazado' ? 'selected' : ''; ?>>Rechazado</option>
                        </select>
                    </div>
                    <div class="seccion" style="display: block;">
                        <label for="fecha_recoleccion">Fecha Estimada de Recolección:</label>
                        <input type="date" name="fecha_recoleccion" value="<?php echo htmlspecialchars($empresa->getFechaEstimadaDeRecoleccion()); ?>" required>
                    </div>
                    <div class="seccion" style="display: block;">
                        <label for="cantidad">Cantidad Requerida:</label>
                        <input type="number" name="cantidad" value="<?php echo htmlspecialchars($empresa->getCantidadRequerida()); ?>" required>
                    </div>
                    <div class="seccion" style="display: block;">
                        <button type="submit">Actualizar Empresa</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php require_once FOOTER; ?>
