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
            <th scope='col'>Asignatura</th>
            <th scope='col'>Acción</th>
          </tr>
        </thead>
        <tbody id="tablausuarios">
          <?php
          foreach (AdminController::DevolverAsignaturasNoAprovadas() as $fila) {
            echo '
            <tr><td scope="row">' . $fila["userId"] . '</td>
		<td scope="row">' . UserController::DevolverUserConId($fila["userId"]) -> nombre . '</td>
		<td scope="row">' . UserController::DevolverUserConId($fila["userId"]) -> apellido . '</td>
    <td scope="row">' . $fila["nombreAsignatura"] . '</td>
    <td scope="row"><a href="/aprovarasignatura' . $fila["userId"] . '.' . $fila["nombreAsignatura"]. '" class="btn btn-success" role="button" style="background-color: green"> </a> <a href="/denegarasignatura' . $fila["userId"] . '.' . $fila["nombreAsignatura"]. '" class="btn btn-danger" role="button" style="background-color: red"> </a></td></tr>
            ';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require_once "footer.php" ?>