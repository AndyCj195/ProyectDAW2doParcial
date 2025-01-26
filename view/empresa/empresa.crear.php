<?php require_once HEADER; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Consulta</title>
    <style>
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .contenedorform {        
            padding: 25px;
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
            padding: 15px;
            margin-top: 15px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        .contenedorform button {
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color:rgb(44, 126, 28);
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
            <h1>Solicitud De Reciclaje</h1>
            <form action="index.php?c=Empresa&f=crear" method="POST">
                <label for="materiales">Tipo de Materiales:</label>
                <div>
                    <label><input type="checkbox" name="materiales[]" value="Plástico"> Plástico</label>
                    <label><input type="checkbox" name="materiales[]" value="Vidrio"> Vidrio</label>
                    <label><input type="checkbox" name="materiales[]" value="Metal"> Metal</label>
                    <label><input type="checkbox" name="materiales[]" value="Madera"> Madera</label>
                    <label><input type="checkbox" name="materiales[]" value="Cartón"> Cartón</label>
                    <label><input type="checkbox" name="materiales[]" value="Papel"> Papel</label>

                </div>
                <label for="zona">Zona:</label>
                <input type="text" name="zona" required>

                <label for="estado">Estado de la Solicitud:</label>
                <select name="estado" required>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Aprobado">Aprobado</option>
                    <option value="Rechazado">Rechazado</option>
                </select>

                <label for="fecha_recoleccion">Fecha Estimada de Recolección:</label>
                <input type="date" name="fecha_recoleccion" required>

                <label for="cantidad">Cantidad Requerida:</label>
                <input type="number" name="cantidad" required>

                <button type="submit">Crear Empresa</button>
            </form>
        </div>
    </main>
</body>

</html>
<?php require_once FOOTER; ?>