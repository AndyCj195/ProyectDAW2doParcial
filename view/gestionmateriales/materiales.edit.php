<!--autor:Arroba Carrillo Omar Andrés-->

<?php require_once HEADER; ?>

<div id="principal">
    <h2><?php echo $titulo; ?></h2>
    <div class="card card-body">
        <form action="index.php?c=Materiales&f=edit" method="POST" name="formMaterialEdit" id="formMaterialEdit">
            
            <!-- Oculto para enviar el ID del material -->
            <input type="hidden" name="id" id="id" value="<?php echo $material["id"]; ?>" />

            <div class="form">
                <!-- Tipo de Materiales -->
                <div class="elemento">
                    <label for="tipoDeMateriales">Tipo de Materiales</label>
                    <input type="text" name="tipoDeMateriales" id="tipoDeMateriales" 
                           value="<?php echo htmlspecialchars($material['tipoDeMateriales']); ?>" 
                           class="form-control" placeholder="Ej. Plástico, Vidrio, Papel..." required>
                </div>

                <!-- Cantidad Total (Kg) -->
                <div class="elemento">
                    <label for="cantidadTotalKg">Cantidad Total (Kg)</label>
                    <input type="number" step="0.01" name="cantidadTotalKg" id="cantidadTotalKg" 
                           value="<?php echo htmlspecialchars($material['cantidadTotalKg']); ?>" 
                           class="form-control" placeholder="Ej. 100.5" required>
                </div>

                <!-- Estado del Material -->
                <div class="elemento">
                    <label for="estadoDelMaterial">Estado del Material</label>
                    <select id="estadoDelMaterial" name="estadoDelMaterial" class="form-control">
                        <?php
                        $estados = ['Disponible', 'Procesado', 'No disponible'];
                        foreach ($estados as $estado) {
                            $selected = ($estado == $material['estadoDelMaterial']) ? 'selected="selected"' : '';
                            echo "<option value='$estado' $selected>$estado</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Comunidad/Zona Asociada -->
                <div class="elemento">
                    <label for="comunidadZonaAsociada">Comunidad/Zona Asociada</label>
                    <input type="text" name="comunidadZonaAsociada" id="comunidadZonaAsociada" 
                           value="<?php echo htmlspecialchars($material['comunidadZonaAsociada']); ?>" 
                           class="form-control" placeholder="Ej. Zona Norte, Comunidad A" required>
                </div>

                <!-- Empresa Asignada -->
                <div class="elemento">
                    <label for="empresaAsignada">Empresa Asignada</label>
                    <input type="text" name="empresaAsignada" id="empresaAsignada" 
                           value="<?php echo htmlspecialchars($material['empresaAsignada']); ?>" 
                           class="form-control" placeholder="Nombre de la empresa encargada" required>
                </div>

                <!-- Botones de acción -->
                <div class="elemento">
                    <button type="submit" class="btn btn-light" 
                            onclick="if (!confirm('¿Está seguro de modificar este material?')) return false;">Guardar</button>
                    <a href="index.php?c=Materiales&f=search" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once FOOTER; ?>