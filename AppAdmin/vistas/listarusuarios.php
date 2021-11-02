<?php require_once "principal.php" ?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h3 class="text-center display-3">Eliminar Usuario</h3>
      <form action="/eliminarusuario" method="post">
        <input type="text" id="usuario" name="id" class="form-control " placeholder="Cedula" minlength="8" maxlength="8" onkeypress="return onlyNumberKey(event)">
        <input type="submit" id="btnEliminarUsuario" class="btn btn-primary" value="Eliminar Usuario">
      </form>
    </div>
    <div class="col-md-6">
      <table class="table" id="tabla">
        <thead class="thead-dark">
          <tr>
            <th scope='col'>Cedula</th>
            <th scope='col'>Nombre</th>
            <th scope='col'>Apellido</th>
          </tr>
        </thead>
        <tbody id="tablausuarios">
          <?php
          foreach (AdminController::DevolverListaDeUsuarios() as $fila) {
            echo '
            <tr><td scope="row">' . $fila["id"] . '</td>
		<td scope="row">' . $fila["nombre"] . '</td>
		<td scope="row">' . $fila["apellido"] . '</td></tr>
            ';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
      return false;
    return true;
  }
</script>
<?php require_once "footer.php" ?>