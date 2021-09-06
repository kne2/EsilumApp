<?php require_once "principal.php"?>
    <div class="card-body p-2 p-sm-3">
            <?php if(isset($parametros['exito']) && $parametros['exito'] == false): ?>
                <div style="color: #FF0000"> Error</div>
            <?php endif; ?>
            <form action="/realizarconsulta" method="post">
                <div class="form-group">
                    <label for="consultaTitulo">Titulo</label>
                    <input type="text" class="form-control" id="consultaTitulo" name="consultaTitulo">
                </div>
                <div class="form-group">
                    <label for="consultaDescripcion">Descripción</label>
                    <textarea class="form-control" id="consultaDescripcion" name="consultaDescripcion" rows="3"></textarea>
                </div>
                <div class="form-row">
                        <input class="btn btn-primary" type="submit" value="Enviar consulta">
                </div>
            </form>
    </div>
<?php require_once "footer.php"?>