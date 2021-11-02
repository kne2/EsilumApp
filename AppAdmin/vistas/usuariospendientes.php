<?php require_once "principal.php" ?>

<div class="container">
  <div class="row p-2">
    <div class="col-md-12">
      <table class="table" id="tabla">
        <thead class="thead-dark">
          <tr>
            <th scope='col'>Cedula</th>
            <th scope='col'>Nombre</th>
            <th scope='col'>Apellido</th>
            <th scope='col'>Acción</th>
          </tr>
        </thead>
        <tbody id="tablausuarios">
          <?php
          foreach (AdminController::DevolverUsuariosNoAprovados() as $fila) {
            echo '
            <tr><td scope="row">' . $fila["id"] . '</td>
		<td scope="row">' . UserController::DevolverUserConId($fila["id"]) -> nombre . '</td>
		<td scope="row">' . UserController::DevolverUserConId($fila["id"]) -> apellido . '</td>
    <td scope="row"><a href="/aprovarusuario' .$fila["id"].'" class="btn btn-success" role="button" style="background-color: green"> </a> <a href="/denegarusuario' . $fila["id"] . '" class="btn btn-danger" role="button" style="background-color: red"> </a></td></tr>
            ';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require_once "footer.php" ?>