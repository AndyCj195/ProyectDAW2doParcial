<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Consulta</title>
</head>

<body>
    <h2>Eliminar Solicitud</h2>
    <p>¿Estás seguro de que deseas eliminar esta solicitud?</p>
    <form action="index.php?c=Empresa&f=delete" method="post">
        <input type="hidden" name="id" value="1">
        <button type="submit">Sí, Eliminar</button>
        <a href="index.php?page=listar">Cancelar</a>
    </form>
</body>

</html>