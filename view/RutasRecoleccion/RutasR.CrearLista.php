<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/forms.css">
    <title>Crear Nueva Ruta</title>
    <!-- Autor: Cesar Xavier Villacis Alvia -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            color: #2a4d2a;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
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
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="index.php?c=Rutas&f=create" method="POST">
        <h1>Crear Nueva Ruta de Recolección</h1>
        <label for="FechaDeRecoleccion">Fecha de Recolección:</label>
        <input type="date" name="FechaDeRecoleccion" id="FechaDeRecoleccion" required>

        <label for="HoraDeRecoleccion">Hora de Recolección:</label>
        <input type="time" name="HoraDeRecoleccion" id="HoraDeRecoleccion" required>

        <label for="materialesARecoger">Materiales a Recoger:</label>
        <textarea name="materialesARecoger" id="materialesARecoger" required></textarea>

        <label for="EmpresaEncargada">Empresa Encargada:</label>
        <input type="text" name="EmpresaEncargada" id="EmpresaEncargada" required>

        <label for="SectorCubierto">Sector Cubierto:</label>
        <input type="text" name="SectorCubierto" id="SectorCubierto" required>

        <label for="VehiculoAsignado">Vehículo Asignado:</label>
        <input type="text" name="VehiculoAsignado" id="VehiculoAsignado">

        <button type="submit" onclick="if (!confirm('Esta seguro de crear la ruta?')) return false;">Actualizar</button>

    </form>
</body>
</html>
