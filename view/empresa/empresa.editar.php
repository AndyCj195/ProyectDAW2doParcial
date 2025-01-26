<!-- Autor: Ortuño Sánchez Juliet Diocelin-->
<?php require_once HEADER; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empresas</title>
    <link rel="stylesheet" href="assets/css/styleForm.css">
    <style>
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .contenedorform {
            padding: 50px;
            margin: 0 auto;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .contenedorform h1 {
            text-align: center;
        }

        .contenedorform form {
            display: flex;
            flex-direction: column;
        }

        .contenedorform label {
            margin-top: 20px;
        }

        .contenedorform input,
        .contenedorform select {
            padding: 10px;
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .contenedorform button {
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: rgb(44, 126, 28);
            color: white;
            cursor: pointer;
        }

        .contenedorform div {
            display: flex;
            justify-content: space-between;
            
        }
    </style>
</head>

<body>
    <main>
        <div class="contenedorform">
        <h1> Editar Solicitud </h1>
        <form action="index.php?c=Empresa&f=edit&id=<?php echo $empresa->getId(); ?>" method="POST">
            <label for="materiales">Tipo de Material Solicitado:</label>
            <?php
            // Obtener los materiales seleccionados
            $materialesSeleccionados = explode(", ", $empresa->getTipoDeMaterialSolicitado());
            ?>
            <div>
                <label><input type="checkbox" value="Plástico" <?php if (in_array("Plástico", $materialesSeleccionados))
                    echo 'checked'; ?> name="materiales[]">
                    Plástico</label>
                <label><input type="checkbox" value="Vidrio" <?php if (in_array("Vidrio", $materialesSeleccionados))
                    echo 'checked'; ?> name="materiales[]">
                    Vidrio</label>
                <label><input type="checkbox" value="Metal" <?php if (in_array("Metal", $materialesSeleccionados))
                    echo 'checked'; ?> name="materiales[]">
                    Metal</label>
                <label><input type="checkbox" value="Madera" <?php if (in_array("Madera", $materialesSeleccionados))
                    echo 'checked'; ?> name="materiales[]">
                    Madera</label>
                <label><input type="checkbox" value="Cartón" <?php if (in_array("Cartón", $materialesSeleccionados))
                    echo 'checked'; ?> name="materiales[]">
                    Cartón</label>
                <label><input type="checkbox" value="Papel" <?php if (in_array("Papel", $materialesSeleccionados))
                    echo 'checked'; ?> name="materiales[]">
                    Papel</label>
            </div>

            <label for="zona">Zona:</label>
            <input type="text" name="zona"
                value="<?php echo htmlspecialchars($empresa->getZonaComunidadConsultada()); ?>" required>

            <label for="estado">Estado de la Solicitud:</label>
            <select name="estado">
                <option value="">Selecciones...</option>
                <option value="Pendiente" <?php echo $empresa->getEstadoDeLaSolicitud() === 'Pendiente' ? 'selected' : ''; ?>>Pendiente
                </option>
                <option value="Aprobado" <?php echo $empresa->getEstadoDeLaSolicitud() === 'Aprobado' ? 'selected' : ''; ?>>Aprobado</option>
                <option value="Rechazado" <?php echo $empresa->getEstadoDeLaSolicitud() === 'Rechazado' ? 'selected' : ''; ?>>Rechazado
                </option>
            </select>

            <label for="fecha_recoleccion">Fecha Estimada de Recolección:</label>
            <input type="date" name="fecha_recoleccion"
                value="<?php echo htmlspecialchars($empresa->getFechaEstimadaDeRecoleccion()); ?>" required>

            <label for="cantidad">Cantidad Requerida:</label>
            <input type="number" name="cantidad"
                value="<?php echo htmlspecialchars($empresa->getCantidadRequerida()); ?>" required>

            <button type="submit">Actualizar Empresa</button>

        </form>
        </div>
    </main>
</body>

</html>
<?php require_once FOOTER; ?>