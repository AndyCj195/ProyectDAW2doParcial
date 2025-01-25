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
        <header id="header">
                <div class="header-logo">
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
                                    <li><a href="index.php?c=index&f=about">Acerca de</a></li>
                                    <li><a href="index.php?c=index&f=contact">Contacto</a></li>
                                </ul>
                            </nav>
                        </div> 
                    <?php else: ?> 
                        <div id="botones-registro">
                            <button onclick="location.href='index.php?c=Usuario&f=logout'" style="background-color: #e6e6e6; border: 1px solid #e6e6e6; color: #6d9f71; text-decoration: none;">Cerrar Sesión</button>
                        </div>
                        <!-- Opciones según el tipo de usuario -->
                        <div id="botones-pagina">
                            <nav>
                                <ul class="menu">
                                    <li><a href="index.php">Inicio</a></li>
                                    <?php if ($tipoDeUsuario === 'Administrador'): ?>
                                        <!-- Opciones para Administrador -->
                                        <li><a href="index.php?c=Admin&f=manageUsers">Gestionar Rutas</a></li>
                                        <li><a href="index.php?c=Usuario&f=listUser">Gestionar Usuarios</a></li>
                                        
                                    <?php elseif ($tipoDeUsuario === 'Empresa'): ?>
                                        <!-- Opciones para Empresa -->
                                        <li><a href="index.php?c=Empresa&f=manage">Gestionar Empresa</a></li>
                                        <li><a href="index.php?c=Empresa&f=reports">Reportes</a></li>
                                    <?php else: ?>
                                        <!-- Opciones para Usuario Normal -->
                                        <li><a href="index.php?c=Usuario&f=perfil">Mi Perfil</a></li>
                                        <li><a href="index.php?c=Rutas&f=index">Ver Rutas</a></li>

                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    <?php endif; ?>
                </div>
        </header>
    