<!-- Autor: Chavez Jimenez Andres -->
<?php require_once HEADER; ?>
<style>
    main {
    font-family: Arial, sans-serif;
    margin: 20px;
    color: #333;
}

main h1 {
    font-size: 24px;
    color: #2a4d2a;
    text-align: center;
    margin-bottom: 10px;
}

#main-header {
    margin-bottom: 20px;
}

#main-header .search {
    display: flex;
    align-items: center;
}

#main-header .search input {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 250px;
    font-size: 14px;
}

#main-header .search button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    margin-left: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#main-header .search button:hover {
    background-color: #3e8e41;
}

#main-header .dump button {
    padding: 10px 20px;
    background-color: #e53935;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#main-header .dump button:hover {
    background-color: #c62828;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
}

table thead {
    background-color: #4CAF50;
    color: white;
}

table thead th {
    padding: 15px;
    text-align: left;
    font-size: 14px;
}

table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tbody tr:hover {
    background-color: #f1f1f1;
}

table tbody td {
    padding: 15px;
    text-align: left;
    font-size: 14px;
    border-bottom: 1px solid #ddd;
}

table tbody td a {
    text-decoration: none;
    color: #007bff;
    font-size: 14px;
    margin-right: 10px;
}

table tbody td a:hover {
    color: #0056b3;
}

@media (max-width: 768px) {
    table thead {
        display: none;
    }

    table tbody tr {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    table tbody td {
        display: flex;
        justify-content: space-between;
        padding: 10px;
    }

    table tbody td:before {
        content: attr(data-label);
        font-weight: bold;
        margin-right: 10px;
        color: #555;
    }
}

</style>
<main>
    <h1>Usuarios</h1><hr>
    <div id="main-header" style="display: flex; justify-content: space-between;">
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
                <th>Acciones</th>
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