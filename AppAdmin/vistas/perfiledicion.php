<?php require_once "principal.php"?>
<div style="padding: 20px;">
    <form>
        <fieldset disabled>
            <div class="form-group">
                <label for="formGroupExampleInput">Cedula de identidad</label>
                <input type="text" class="form-control" id="cedula" placeholder="<?php echo $_SESSION['usuarioId'] ?>">
            </div>
        </fieldset>
    </form>
    <form action="/editarperfil" method="post">
    <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombre/s*</label>
                    <input type="text" class="form-control" name="profileNombre" value="<?php echo $_SESSION['usuarioNombre'] ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Apellido/s*</label>
                    <input type="text" class="form-control"  name="profileApellido" value="<?php echo $_SESSION['usuarioApellido'] ?>" required> 
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" value="<?php echo $_SESSION['usuarioEmail'] ?>" name="profileEmail">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Avatar*</label>
                    <select name="profileAvatar" id="inputState" class="form-control">
                <option selected name="profileAvatar" value="<?php echo $_SESSION['usuarioAvatar'] ?>" ><?php echo $_SESSION['usuarioAvatar'] ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
            </select>
            </div>
        </div>
        <fieldset disabled>
            <div class="form-group">
                <label for="formGroupExampleInput">Tipo de usuario</label>
                <input type="text" class="form-control" id="cedula" placeholder="<?php echo $_SESSION['usuarioTipodeusuario'] ?>">
            </div>
        </fieldset>
        <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Contraseña*</label>
                    <input type="password" class="form-control"  name="profilePassword1" required> 
                    <div class="invalid-feedback">
                        Ingrese nueva contraseña
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Repetir Contraseña*</label>
                    <input type="password" class="form-control"  name="profilePassword2" required>
                    <div class="invalid-feedback">
                        Ingrese nueva contraseña
                    </div>
                </div>
        </div>
        <div class="form-row">
            <input class="btn btn-primary" type="submit" value="Actualizar perfil">   
            <a href="/perfil" class="btn btn-secondary" role="button" aria-pressed="true">Cancelar edición</a>
        </div>
    </form>
    *Campos obligatorios
</div>
<?php require_once "footer.php"?>