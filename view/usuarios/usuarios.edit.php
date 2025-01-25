<?php require_once HEADER; ?>
<main>
    <div>
        <h1>Edicion de Usuario</h1>
    </div>
    <div>
        <form action="index.php?c=Usuario&f=edit" method="POST" name="formEditUser" id="formEditUser">
            <div>
                <input type="hidden" name="id" value="<?php echo $usuario['id_Usuario'] ?>">
            </div>
            <div>
                <label for="nombres">Nombres</label>
                <input type="text" name="nombres" id="nombres" value="<?php echo $usuario['nombres'] ?>">
            </div>
            <div>
                <label for="correo">Correo</label>
                <input type="email" name="correo" id="correo" value="<?php echo $usuario['correo'] ?>">
            </div>
            <div>
                <label for="cedula">Cedula</label>
                <input type="text" name="cedula" id="cedula" value="<?php echo $usuario['cedula'] ?>">
            </div>
            <div>
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" value="<?php echo $usuario['telefono'] ?>">
            </div>
            <div>
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" id="direccion" value="<?php echo $usuario['direccion'] ?>">
            </div>
            <div>
                <label for="tipoDeUsuario">Tipo de Usuario</label>
                <select name="tipoDeUsuario" id="tipoDeUsuario">
                    <option value="">Seleccione...</option>
                    <option value="Empresa" <?php echo $usuario['tipoDeUsuario'] === 'Empresa' ? 'selected' : ''; ?>>Empresa</option>
                    <option value="Usuario" <?php echo $usuario['tipoDeUsuario'] === 'Usuario' ? 'selected' : ''; ?>>Usuario</option>
                </select>
            </div>
            <div>
                <label for="estado">Estado</label>
                <label for="estado"> <?php echo $usuario['Estado'] ?></label>
            </div>
            <div>
                <button type="submit" 
                onclick="if (!confirm('Esta seguro de modificar el producto?')) return false;">Actualizar</button>
            </div>
        </form>
    </div>
</main>
<?php require_once FOOTER; ?>