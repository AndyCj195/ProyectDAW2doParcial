<?php require_once HEADER; ?>
<style>

</style>
<main>
    <h1>Usuarios</h1><hr>
    <div id="main-header" style="display: flex; justify-content: space-between;">
        <div class="search">
            <form action="">
                <input type="text" name="b" id="search" placeholder="Buscar...">
                <button type="submit" value="Buscar">Buscar</button> 
            </form>
        </div>
        <div class="dump">
            <a href="index.php?c=Usuario&f=view_dump">
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
                        <a href="index.php?c=Usuario&f=logicalDeleteUser&id=<?= $usuario->getId() ?>" 
                        onclick="if(!confirm('Está seguro de eliminar el producto?'))return false;"
                         >Eliminar</a>
                        
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<?php require_once FOOTER; ?>