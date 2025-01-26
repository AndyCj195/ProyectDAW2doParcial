<?php require_once HEADER; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empresas</title>
    <style>
        .contenedorl {
            width: 100%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contenedorl h1 {
            text-align: center;
            margin: 20px;
        }

        .botonc {
            text-align: center;
            margin-bottom: 30px;
            display: inline-block;
            margin-right: auto;
        }

        .botonc a {

            padding: 10px 20px;
            background-color: rgb(44, 126, 28);
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background-color: rgb(44, 126, 28);
            color: white;
        }

        table th,
        table td {
            padding: 7px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .llamar {
            background-color: white;
        }
        .editarb a, .eliminarb a {
            display: inline-block;
            margin: 5px;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }

        .editarb a {
            background-color: rgb(44, 126, 28);
        }

        .eliminarb a {
            background-color: rgb(221, 75, 75);
        }
    </style>
</head>

<body>
    <div class="contenedorl">
        <h1>Listado de Solicitudes Empresas</h1>
        <div class="botonc">
        <a href="index.php?c=Empresa&f=crear">Crear Nueva Empresa</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Material Solicitado</th>
                    <th>Zona/Comunidad Consultada</th>
                    <th>Estado de la Solicitud</th>
                    <th>Fecha Estimada de Recolección</th>
                    <th>Cantidad Requerida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <div class="llamar">
                <tbody>
                    <?php foreach ($empresas as $empresa): ?>
                        <tr>
                            <td><?php echo $empresa->getId(); ?></td>
                            <td><?php echo $empresa->getTipoDeMaterialSolicitado(); ?></td>
                            <td><?php echo $empresa->getZonaComunidadConsultada(); ?></td>
                            <td><?php echo $empresa->getEstadoDeLaSolicitud(); ?></td>
                            <td><?php echo $empresa->getFechaEstimadaDeRecoleccion(); ?></td>
                            <td><?php echo $empresa->getCantidadRequerida(); ?></td>
                            <td>
                                <div class="editarb">
                                <a href="index.php?c=Empresa&f=view_edit&id=<?php echo $empresa->getId(); ?>">Editar</a>
                                </div>
                                <div class="eliminarb">
                                <a href="index.php?c=Empresa&f=eliminar&id=<?php echo $empresa->getId(); ?>"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta empresa?');">Eliminar</a>
                                    </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </div>
        </table>
    </div>
</body>

</html>
<?php require_once FOOTER; ?>