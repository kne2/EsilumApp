<?php require_once "principal.php" ?>
<div class="card mb-2">
    <div class="card-body p-2 p-sm-3">
        <div class="media forum-item">
            <div class="media-body">
                <h6><p class="text-body font-weight-bold"> <?php echo ConsultaController::DevolverConsultaPorId(ltrim($_SERVER['REQUEST_URI'],'/consulta')) -> titulo  ?> </p></h6>
                <p class="text-secondary">
                    <?php echo ConsultaController::DevolverConsultaPorId(ltrim($_SERVER['REQUEST_URI'],'/consulta')) -> descripcion  ?>
                </p>
                <p class="text-muted"><?php echo UserController::DevolverUserConId(ConsultaController::DevolverConsultaPorId(ltrim($_SERVER['REQUEST_URI'],'/consulta')) -> alumnoId) -> nombre . " " . UserController::DevolverUserConId(ConsultaController::DevolverConsultaPorId(ltrim($_SERVER['REQUEST_URI'],'/consulta')) -> alumnoId) -> apellido ?> - <span class="text-secondary font-weight-bold"><?php echo ConsultaController::DevolverConsultaPorId(ltrim($_SERVER['REQUEST_URI'],'/consulta')) -> fecha  ?> </span> </p>
            </div>
        </div>
    </div>
</div>
<?php foreach($parametros['respuestas'] as $fila) : ?> 
        <div class="card mb-2">
            <div class="card-body p-2 p-sm-3">
                <div class="media forum-item">
                    <div class="card-body p-2 p-sm-3">
                        <p class="text-secondary">
                            <?php echo $fila["contenido"] ?> <br>
                        </p>
                    </div>
                    <br>
                    <p class="text-muted"> <br> <?php echo UserController::DevolverUserConId($fila["userId"]) -> nombre. ' ' . UserController::DevolverUserConId($fila["userId"]) -> apellido ?> - <span class="text-secondary font-weight-bold"> <?php echo $fila["fecha"] ?> </span></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>

<?php if ($_SESSION['usuarioTipodeusuario'] == "docente"):?>
<div class="card-body p-2 p-sm-3">
            <form action="/realizarrespuesta<?php echo ltrim($_SERVER['REQUEST_URI'],'/consulta') ?>" method="post">
                <div class="form-group">
                    <label for="respuestaContenido">Respuesta</label>
                    <textarea class="form-control" id="respuestaContenido" name="respuestaContenido" rows="3"></textarea>
                </div>
                <div class="form-row">
                        <input class="btn btn-primary" type="submit" value="Enviar respuesta">
                </div>
            </form>
</div>
<?php endif; ?>
<?php require_once "footer.php" ?>