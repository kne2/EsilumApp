<?php require_once "principal.php"?>
    <div class="card-body p-2 p-sm-3">
    <h1><span style="font-size: 20px;">Selecciona las materias en las que enseñas</span></h1>
            <form action="/grupos" method="post">
                <?php foreach($parametros['asignaturas'] as $key => $valor) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value=<?php echo $key; ?>
 id="checkbox<?php echo $key?>" name=<?php echo $key; ?> <?php if($valor) echo "checked"; ?>>
                        <label class="form-check-label" for="defaultCheck1">
                            <?php echo $key?>
                        </label>
                    </div>
                <?php endforeach ?>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
    </div>
<?php require_once "footer.php"?>