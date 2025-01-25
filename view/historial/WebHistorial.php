<?php
require_once 'Config/config.php'; // Asegúrate de que esta ruta sea correcta
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleForm.css">
    <title>Formulario Historial</title>
    <style>
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        form {
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px 0px #000000;
            width: 100%;
            max-width: 500px;
        }

        form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        form input, form select, form button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form button {
            background-color: #376e3c;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }

        form button:hover {
            background-color: #2e5730;
        }

        .sec_frase {
            text-align: center;
            background-color: #f5d547;
            color: #376e3c;
            margin-top: 30px;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 10px;
        }

        table {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f0f8ff;
        }

        table td a {
            text-decoration: none;
            color: #376e3c;
        }

        table td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php require_once HEADER; ?>
    <main>
        <!-- Formulario para crear/actualizar registros -->
        <form action="index.php?c=Historial&f=index" method="post">
            <h2><?php echo isset($registroEdit) ? 'Editar Registro' : 'Nuevo Registro'; ?></h2>

            <input type="hidden" name="id_HistorialRegistros" value="<?php echo isset($registroEdit) ? htmlspecialchars($registroEdit['id_HistorialRegistros']) : ''; ?>">

            <label for="fechaDeRegistro">Fecha de Registro:</label>
            <input type="datetime-local" name="fechaDeRegistro" value="<?php echo isset($registroEdit) ? htmlspecialchars($registroEdit['FechaDeRegistro']) : ''; ?>" required>

            <label for="tipoDelMaterial">Tipo del Material:</label>
            <input type="text" name="tipoDelMaterial" value="<?php echo isset($registroEdit) ? htmlspecialchars($registroEdit['TipoDelMaterialReciclado']) : ''; ?>" required>

            <label for="cantidadReciclada">Cantidad Reciclada (kg):</label>
            <input type="number" step="1" name="cantidadReciclada" value="<?php echo isset($registroEdit) ? htmlspecialchars($registroEdit['CantidadReciclada']) : ''; ?>" required>

            <label for="estadoDelRegistro">Estado del Registro:</label>
            <select name="estadoDelRegistro" required>
                <option value="Pendiente" <?php echo (isset($registroEdit) && $registroEdit['EstadoDelRegistro'] === 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                <option value="Completado" <?php echo (isset($registroEdit) && $registroEdit['EstadoDelRegistro'] === 'Completado') ? 'selected' : ''; ?>>Completado</option>
                <option value="Cancelado" <?php echo (isset($registroEdit) && $registroEdit['EstadoDelRegistro'] === 'Cancelado') ? 'selected' : ''; ?>>Cancelado</option>
            </select>

            <label for="empresaRecolectora">Empresa Recolectora:</label>
            <input type="text" name="empresaRecolectora" value="<?php echo isset($registroEdit) ? htmlspecialchars($registroEdit['EmpresaRecolectora']) : ''; ?>" required>

            <button type="submit" name="action" value="<?php echo isset($registroEdit) ? 'update' : 'create'; ?>">
                <?php echo isset($registroEdit) ? 'Actualizar' : 'Registrar'; ?>
            </button>
        </form>

        <!-- Formulario para buscar registros -->
        <form action="index.php?c=Historial&f=index" method="get" style="margin-top: 20px;">
            <input type="text" name="search" placeholder="Buscar registros..." value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">
            <button type="submit">Buscar</button>
        </form>

        <!-- Tabla de registros -->
        <table>
            <thead>
                <tr>
                    <th>Fecha de Registro</th>
                    <th>Tipo de Material</th>
                    <th>Cantidad Reciclada</th>
                    <th>Estado del Registro</th>
                    <th>Empresa Recolectora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($registros) && !empty($registros)): ?>
                    <?php foreach ($registros as $registro): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($registro['FechaDeRegistro']); ?></td>
                            <td><?php echo htmlspecialchars($registro['TipoDelMaterialReciclado']); ?></td>
                            <td><?php echo htmlspecialchars($registro['CantidadReciclada']); ?></td>
                            <td><?php echo htmlspecialchars($registro['EstadoDelRegistro']); ?></td>
                            <td><?php echo htmlspecialchars($registro['EmpresaRecolectora']); ?></td>
                            <td>
                                <a href="index.php?c=Historial&f=index&action=edit&id_HistorialRegistros=<?php echo $registro['id_HistorialRegistros']; ?>">Editar</a> | 
                                <a href="index.php?c=Historial&f=index&action=delete&id_HistorialRegistros=<?php echo $registro['id_HistorialRegistros']; ?>" 
                                onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">No hay registros disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <?php require_once FOOTER; ?>
</body>
</html>