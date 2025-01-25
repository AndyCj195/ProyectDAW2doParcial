<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Consulta</title>
</head>
<body>
    <h1>Formulario de Consulta para Reciclaje</h1>
    <form method="POST" actiont="index.php?c=Empresa&f=crear">
        <label>Tipo de Material Solicitado:</label><br>
        <input type="checkbox" name="tipoMaterial[]" value="Papel"> Papel<br>
        <input type="checkbox" name="tipoMaterial[]" value="Plástico"> Plástico<br>
        <input type="checkbox" name="tipoMaterial[]" value="Vidrio"> Vidrio<br>
        <input type="checkbox" name="tipoMaterial[]" value="Metal"> Metal<br><br>

        <label for="zonaComunidad">Zona o Comunidad Consultada:</label><br>
        <input type="text" name="zonaComunidad" id="zonaComunidad" required><br><br>

        <label for="fechaEstimada">Fecha Estimada de Recolección:</label><br>
        <input type="date" name="fechaEstimada" id="fechaEstimada"><br><br>

        <label for="cantidadRequerida">Cantidad Requerida (en kg):</label><br>
        <input type="number" name="cantidadRequerida" id="cantidadRequerida" step="0.01" required><br><br>

        <label for="estado">Estado de Solicitud:</label>
        <select id="estado" name="estado" required>
            <option value="">Selecciona un estado</option>
            <option value="pendiente">Pendiente</option>
            <option value="en_proceso">En Proceso</option>
            <option value="completado">Completado</option>
        </select>

        <button type="submit">Enviar Solicitud</button>
    </form>
</body>
</html>

