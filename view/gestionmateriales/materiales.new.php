<div class="container">
    <h2><?php echo 'Crear nuevo material'; ?></h2>
    <div class="card card-body">
        <form action="index.php?c=Materiales&f=new" method="POST" name="formMaterialNuevo" id="formMaterialNuevo">
            <div class="form-row">
                <!-- Tipo de Material -->
                <div class="form-group col-sm-6">
                    <label for="tipoDeMateriales">Tipo de Material</label>
                    <input type="text" name="tipoDeMateriales" id="tipoDeMateriales" 
                           class="form-control" placeholder="Ejemplo: Plástico, Vidrio" maxlength="255" required>
                </div>
                <!-- Cantidad Total -->
                <div class="form-group col-sm-6">
                    <label for="cantidadTotalKg">Cantidad Total (Kg)</label>
                    <input type="number" step="0.01" name="cantidadTotalKg" id="cantidadTotalKg" 
                           class="form-control" placeholder="Cantidad en kilogramos" required>
                </div>
                <!-- Estado del Material -->
                <div class="form-group col-sm-6">
                    <label for="estadoDelMaterial">Estado del Material</label>
                    <select id="estadoDelMaterial" name="estadoDelMaterial" class="form-control" required>
                        <option value="Disponible">Disponible</option>
                        <option value="Procesado">Procesado</option>
                        <option value="No disponible">No disponible</option>
                    </select>
                </div>
                <!-- Comunidad/Zona Asociada -->
                <div class="form-group col-sm-6">
                    <label for="comunidadZonaAsociada">Comunidad/Zona Asociada</label>
                    <input type="text" id="comunidadZonaAsociada" name="comunidadZonaAsociada" 
                        class="form-control" placeholder="Escriba la comunidad o zona asociada" maxlength="255" required>
                </div>

                <!-- Empresa Asignada -->
                <div class="form-group col-sm-6">
                    <label for="empresaAsignada">Empresa Asignada</label>
                    <input type="text" id="empresaAsignada" name="empresaAsignada" 
                        class="form-control" placeholder="Escriba el nombre de la empresa asignada" maxlength="255" required>
                </div>
                <!-- Botones de acción -->
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php?c=Usuario&f=index" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
