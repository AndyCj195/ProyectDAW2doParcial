<!--Author: Jorge Suárez Valarezo-->    
<?php require_once HEADER ?>
<style>
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .lista-clase {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    form {
        background-color: #f0f8ff;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0px 0px 10px 0px #000000;
        width: 100%;
        max-width: 500px;
        margin-bottom: 20px;
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

    form input,
    form select,
    form button {
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

    table th,
    table td {
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
<main>
    <!-- Sección de búsqueda y tabla para Empresa o Administrador -->
        <div class="lista-clase">
            <!-- Formulario para buscar registros -->
            <form action="index.php?c=Historial&f=index" method="get" style="margin-top: 20px;">
                <input type="hidden" name="c" value="Historial">
                <input type="hidden" name="f" value="index">
                <input type="text" name="search" placeholder="Buscar registros..."
                    value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">
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
                                    <a
                                        href="index.php?c=Historial&f=index&action=edit&id_HistorialRegistros=<?php echo $registro['id_HistorialRegistros']; ?>">Editar</a>
                                    |
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
        </div>
</main>
<?php require_once FOOTER ?>