<?php require_once HEADER; ?>

<main>
    <h1>Usuarios</h1><hr>
    <div id="main-header">
        <div class="search">
            <form action="">
                <input type="text" name="b" id="search" placeholder="Buscar...">
                <button type="submit" value="Buscar">
            </form>
        </div>
        <div class="dump">
            <a href="index.php?c=Usuario&f=view_register">
                <button>
                    Basurero
                </button>
            </a>

        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Email</th>
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Tipo de Usuario</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario){ ?>
                <tr>
                    <td><?= $usuario->getId()?></td>
                    <td><?= $usuario->getNombres() ?></td>
                    <td><?= $usuario->getCorreo() ?></td>
                    <td><?= $usuario->getCedula() ?></td>
                    <td><?= $usuario->getTelefono() ?></td>
                    <td><?= $usuario->getDireccion() ?></td>
                    <td><?= $usuario->getTipoDeUsuario() ?></td>
                    <td><?= $usuario->getEstado() ?></td>
                    

                    <td>
                        <a href="index.php?c=Usuario&f=view_edit&id=<?= $usuario->getId() ?>">Editar</a>
                        <a href="#" onclick="eliminarUsuario(<?= $usuario->getId() ?>)">Eliminar</a>
                        <script>
                            function eliminarUsuario(id) {
                                var opcion = confirm("¿Desea realizar una eliminación lógica? Presione 'Aceptar' para eliminación lógica o 'Cancelar' para eliminación física.");
                                if (opcion) {
                                    window.location.href = "index.php?c=Usuario&f=eliminar_logico&id=" + id;
                                } else {
                                    window.location.href = "index.php?c=Usuario&f=eliminar_fisico&id=" + id;
                                }
                            }
                        </script>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<?php require_once FOOTER; ?>