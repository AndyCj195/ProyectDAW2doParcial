<!--Author: Andres Chavez Jimenez-->
<?php require_once HEADER; ?>
<main>
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
                        <a href="index.php?c=Usuario&f=restoreUser&id=<?= $usuario->getId() ?>"
                        onclick="if(!confirm('Está seguro de restuarar a este usuario?'))return false;">Volver a Activar</a>
                        
                        <a href="index.php?c=Usuario&f=delete&id=<?= $usuario->getId() ?>" 
                        onclick="if(!confirm('Está seguro de eliminar por completo al usuario?'))return false;"
                         >Eliminar</a>
                        
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php require_once FOOTER; ?>