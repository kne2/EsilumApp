<?php require_once "principal.php"?>
<div class="list-group">
  Consultas
  <?php 
    foreach($parametros['consultas'] as $fila){   
        echo '<a href="/consulta' . $fila["id"] .'" class="list-group-item list-group-item-action">' . $fila['titulo']. ' - '. $fila['fecha'] . " - " . UserController::DevolverUserConId($fila['alumnoId']) -> nombre . " " . UserController::DevolverUserConId($fila['alumnoId']) -> apellido .'</a>';
    }
    ?>
</div>
<?php require_once "footer.php"?>