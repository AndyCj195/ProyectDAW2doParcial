<?php
session_start();
$tipoDeUsuario = $_SESSION['tipoDeUsuario'] ?? null;
$nombreUsuario = $_SESSION['nombreUsuario'] ?? null;
$id_usuario = $_SESSION['id_Usuario'] ?? null;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="assets/images/logoFunnyRecycle.png">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/styleNew.css">
        <title>Usuario</title>
    </head>
    <body>
        <div id="id_container">
        <header id="header">
                <div class="header-logo" style="flex: 1;">
                    <img class="div_logo_header" src="https://pbs.twimg.com/media/GbtRafJW4BEozsZ?format=png&name=small" alt="logo">
                </div>
                <div class="header-botones">
                    <?php if ($tipoDeUsuario === null): ?>
                        <div id="botones-registro">
                            <button onclick="location.href='index.php?c=Usuario&f=index'">Registrarse</button>
                            <button onclick="location.href='index.php?c=index&f=index&p=login'">Iniciar Sesión</button>
                        </div>
                        <div id="botones-pagina">
                            <nav>
                                <ul class="menu">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="index.php?c=index&f=index&p=about">Acerca de</a></li>
                                    <li><a href="index.php?c=index&f=index&p=contact">Contacto</a></li>
                                </ul>
                            </nav>
                        </div> 
                    <?php else: ?> 
                        <div id="botones-registro">
                            <div>
                                <span style="margin: 0px 20px; font-weight: bold; color: white;">
                                    <?php echo htmlspecialchars($tipoDeUsuario ?? ''); ?>
                                </span>
                                <span style="margin: 0px 20px; font-weight: bold; color: white;">
                                    <?php echo htmlspecialchars($nombreUsuario ?? null ); ?>
                                </span>
                            </div>
                            <button onclick="location.href='index.php?c=Usuario&f=logout'" 
                                style="background-color: #e6e6e6; border: 1px solid #e6e6e6; color: #6d9f71; text-decoration: none;">
                                Cerrar Sesión
                            </button>
                        </div>
                        <!-- Opciones según el tipo de usuario -->
                        <div id="botones-pagina">
                            <nav>
                                <ul class="menu">
                                    <li><a href="index.php">Inicio</a></li>
                                    <!-- Botón para redirigir a WebHistorial -->
                                    
                                    <?php if ($tipoDeUsuario === 'Administrador'): ?>
                                        <!-- Opciones para Administrador -->
                                        <li><a href="index.php?c=Rutas&f=index">Gestionar Rutas</a></li>
                                        <li><a href="index.php?c=Usuario&f=listUser">Gestionar Usuarios</a></li>
                                        <li><a href="index.php?c=Materiales&f=search">Gestionar Lista de Materiales</a></li>
                                        <li><a href="index.php?c=Historial&f=list"> Gestionar Historiales de Usuarios</a></li>
                                        <li><a href="index.php?c=Empresa&f=index">Gestionar Empresa</a></li>
                                    <?php elseif ($tipoDeUsuario === 'Empresa'): ?>
                                        <!-- Opciones para Empresa -->
                                        <li><a href="index.php?c=Historial&f=index">Registrar Materiales</a></li>
                                        <li><a href="index.php?c=Empresa&f=index">Gestionar Empresa</a></li>
                                        <li><a href="index.php?c=Rutas&f=createform">Crear Nueva Ruta</a></li>
                                        <li><a href="index.php?c=Rutas&f=index">Gestionar Rutas</a></li>
                                        <li><a href="index.php?c=Materiales&f=search">Materiales Gestionados</a></li>
                                    <?php else: ?>
                                        <!-- Opciones para Usuario Normal -->
                                        <li><a href="index.php?c=Historial&f=index">Registrar Materiales</a></li>
                                        <li><a href="index.php?c=Historial&f=list">Historial</a></li>

                                        <li><a href="index.php?c=Rutas&f=index">Ver Rutas</a></li>
                                        <li><a href="index.php?c=Materiales&f=search">Materiales Gestionados</a></li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    <?php endif; ?>
                </div>
        </header>