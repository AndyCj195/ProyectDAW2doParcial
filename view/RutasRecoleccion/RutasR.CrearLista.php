<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/forms.css">
    <title>Crear Nueva Ruta</title>
    <!-- Autor: Cesar Xavier Villacis Alvia -->
</head>
<body>
    <h1>Crear Nueva Ruta de Recolección</h1>
    <form action="index.php?c=Rutas&f=create" method="POST">
        <label for="FechaDeRecoleccion">Fecha de Recolección:</label>
        <input type="date" name="FechaDeRecoleccion" id="FechaDeRecoleccion" required><br>

        <label for="HoraDeRecoleccion">Hora de Recolección:</label>
        <input type="time" name="HoraDeRecoleccion" id="HoraDeRecoleccion" required><br>

        <label for="materialesARecoger">Materiales a Recoger:</label>
        <textarea name="materialesARecoger" id="materialesARecoger" required></textarea><br>

        <label for="EmpresaEncargada">Empresa Encargada:</label>
        <input type="text" name="EmpresaEncargada" id="EmpresaEncargada" required><br>

        <label for="SectorCubierto">Sector Cubierto:</label>
        <input type="text" name="SectorCubierto" id="SectorCubierto" required><br>

        <label for="VehiculoAsignado">Vehículo Asignado:</label>
        <input type="text" name="VehiculoAsignado" id="VehiculoAsignado"><br>

        <button type="submit" class="btn">Guardar</button>
    </form>
</body>
</html>
