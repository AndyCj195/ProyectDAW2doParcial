<?php
session_start();

$tipoDeUsuario = $_SESSION['tipoDeUsuario'] ?? null;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">

        <title>Usuario</title>
    </head>
    <body>
        <div id="id_container">
        <header>
            <nav>
                <ul class="header-logo">
                    <img class="div_logo_header" src="https://pbs.twimg.com/media/GbtRafJW4BEozsZ?format=png&name=small" alt="logo">
                </ul>
                <ul class="header-nav">
                    <?php if ($tipoDeUsuario === null): ?>
                        <!-- Opciones para usuarios no autenticados -->
                        <div id="botones-registro">
                            <li><button onclick="location.href='index.php?c=Usuario&f=index'">Registrarse</button></li>
                            <li><button onclick="location.href='index.php?c=index&f=index&p=login'">Iniciar Sesión</button></li>
                        </div>
                    <?php else: ?>
                        <!-- Opciones según el tipo de usuario -->
                        <div class="botones-header">
                            <li><button onclick="location.href='index.php'">Inicio</button></li>
                            <?php if ($tipoDeUsuario === 'Administrador'): ?>
                                <!-- Opciones para Administrador -->
                                <li><button onclick="location.href='index.php?c=Admin&f=dashboard'">Dashboard Admin</button></li>
                                <li><button onclick="location.href='index.php?c=Admin&f=manageUsers'">Gestionar Rutas</button></li>
                            <?php elseif ($tipoDeUsuario === 'Empresa'): ?>
                                <!-- Opciones para Empresa -->
                                <li><button onclick="location.href='index.php?c=Empresa&f=manage'">Gestionar Empresa</button></li>
                                <li><button onclick="location.href='index.php?c=Empresa&f=reports'">Reportes</button></li>
                            <?php else: ?>
                                <!-- Opciones para Usuario Normal -->
                                <li><button onclick="location.href='index.php?c=Usuario&f=perfil'">Mi Perfil</button></li>
                                <li><button onclick="location.href='index.php?c=Usuario&f=misReciclajes'">Rutas de Recoleccion</button></li>
                            <?php endif; ?>
                            <!-- Botón para cerrar sesión -->
                            <li><button onclick="location.href='index.php?c=Usuario&f=logout'">Cerrar Sesión</button></li>
                        </div>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
    