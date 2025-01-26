<!-- AUTOR: CESAR XAVIER VILLACIS ALVIA -->

<?php require_once HEADER; ?>
<style>
    main {
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

    h1 {
        color: #2a4d2a;
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        margin: 50px;
        width: 100%;
        max-width: 500px;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #4CAF50;
    }

    input[type="date"],
    input[type="time"],
    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    textarea {
        resize: none;
        height: 80px;
    }

    .btnActualizar {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .btnActualizar:hover {
        background-color: #45a049;
    }
</style>
<main>
    <form action="index.php?c=Rutas&f=edit" method="POST">
        <h1>Editar Ruta de Recolección</h1>
        <input type="hidden" name="id_RutasRecoleccion"
            value="<?php echo htmlspecialchars($ruta['id_RutasRecoleccion']); ?>">

        <label for="FechaDeRecoleccion">Fecha de Recolección:</label>
        <input type="date" name="FechaDeRecoleccion"
            value="<?php echo htmlspecialchars($ruta['FechaDeRecoleccion']); ?>" required>

        <label for="HoraDeRecoleccion">Hora de Recolección:</label>
        <input type="time" name="HoraDeRecoleccion" value="<?php echo htmlspecialchars($ruta['HoraDeRecoleccion']); ?>"
            required>

        <label for="materialesARecoger">Materiales a Recoger:</label>
        <textarea name="materialesARecoger"
            required><?php echo htmlspecialchars($ruta['materialesARecoger']); ?></textarea>

        <label for="EmpresaEncargada">Empresa Encargada:</label>
        <input type="text" name="EmpresaEncargada" value="<?php echo htmlspecialchars($ruta['EmpresaEncargada']); ?>"
            required>

        <label for="SectorCubierto">Sector Cubierto:</label>
        <input type="text" name="SectorCubierto" value="<?php echo htmlspecialchars($ruta['SectorCubierto']); ?>"
            required>

        <label for="VehiculoAsignado">Vehículo Asignado:</label>
        <input type="text" name="VehiculoAsignado" value="<?php echo htmlspecialchars($ruta['VehiculoAsignado']); ?>">

        <button type="submit" class="btnActualizar"
            onclick="if(!confirm('¿Está seguro de modificar la ruta?')) return false;">Actualizar</button>
    </form>
</main>
<?php require_once FOOTER; ?>