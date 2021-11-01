<?php require_once "principal.php" ?>
<form action="/eliminarusuario" method="post">
  <h1> Eliminar usuario </h1>
  <div class="form-group">
    <label for="consultaTitulo">Cedula</label>
    <input type="text" class="form-control" id="id" name="id">
  </div>
  <div class="form-row">
    <input class="btn btn-primary" type="submit" value="Eliminar usuario">
  </div>
</form>
<div class="list-group">
  Consultas
  <?php
  foreach (AdminController::DevolverListaDeUsuarios() as $fila) {
    echo '<a href="#" class="list-group-item list-group-item-action">' . $fila["id"] . ' - ' . $fila["nombre"] . ' - ' . $fila["apellido"] . '</a>';
  }
  ?>
</div>
<?php require_once "footer.php" ?>