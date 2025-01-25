<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Consulta</title>
</head>

<body>
    <h1>Editar Solicitud</h1>
    <form action="index.php?page=listar" method="post">
        <input type="hidden" name="id" value="1">

        <label for="materiales">Tipo de Materiales:</label>
        <div>
            <label><input type="checkbox" name="materiales[]" value="Plástico" checked> Plástico</label>
            <label><input type="checkbox" name="materiales[]" value="Vidrio"> Vidrio</label>
            <label><input type="checkbox" name="materiales[]" value="Papel"> Papel</label>
            <label><input type="checkbox" name="materiales[]" value="Metal"> Metal</label>
        </div>

        <label for="zona">Zona:</label>
        <select name="zona" required>
            <option value="Norte" selected>Norte</option>
            <option value="Sur">Sur</option>
            <option value="Este">Este</option>
            <option value="Oeste">Oeste</option>
        </select>

        <label for="estado">Estado de Solicitud:</label>
        <select name="estado" required>
            <option value="Pendiente" selected>Pendiente</option>
            <option value="En Proceso">En Proceso</option>
            <option value="Completado">Completado</option>
        </select>

        <label for="fecha_recoleccion">Fecha de Recolección:</label>
        <input type="date" name="fecha_recoleccion" value="2025-01-30" required>

        <label for="cantidad">Cantidad Requerida:</label>
        <input type="number" name="cantidad" value="50" required>

        <button type="submit">Actualizar</button>
    </form>
</body>

</html>