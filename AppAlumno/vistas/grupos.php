<?php require_once "principal.php"?>
    <div class="card-body p-2 p-sm-3">
            <form action="/actualizargrupos" method="post">
                <?php foreach($parametros['grupos'] as $fila) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value=<?php echo ($fila == True) ? "True" : 'False'; ?>
 id="checkbox<?php echo key($fila)?>">
                        <label class="form-check-label" for="defaultCheck1">
                            <?php echo key($fila)?>
                        </label>
                    </div>
                <?php endforeach ?>
            </form>
    </div>
<?php require_once "footer.php"?>