<?php require_once "principal.php"?>
    <!-- Estilo precario afanado de internet -->
    <style>
        .center {
            /* this will keep the content center */
            position: absolute;
            right: 0;
            left: 0;
            margin: auto;
        }

        .msg-group {
            position: absolute;
            max-width: 720px;
            height: 92%;
            overflow-y: scroll;  /*if the content beyond width and height, use the scrollbar*/
        }

        .card {
            padding: 10px 0 10px 0;
        }

        .input-group {
            position: absolute;
            height: 8%;
            bottom: 0;
        }

        .btn {
            height:100%;
        }
    </style>
    <div class="card-body p-2 p-sm-3">
    <?php if(ChatController::CheckearEstado(ltrim($_SERVER['REQUEST_URI'],'/chat'))): ?>
        <form action="/realizarchat" method="post">
                <div class="form-group">
                    <label for="consultaDescripcion">Mensaje</label>
                    <input type="hidden" id="chatAsignatura" name="chatAsignatura" value="<?php echo ltrim($_SERVER['REQUEST_URI'],'/chat'); ?>">
                    <textarea class="form-control" id="chatMensaje" name="chatMensaje" rows="5"></textarea>
                </div>
                <div class="form-row">
                        <input class="btn btn-primary" type="submit" value="Crear chat de <?php echo ltrim($_SERVER['REQUEST_URI'],'/chat'); ?>" >
                </div>
            </form>                         
    <?php endif; ?>
    <?php if(!ChatController::CheckearEstado(ltrim($_SERVER['REQUEST_URI'],'/chat'))): ?>
        <script type="text/javascript">

            function tiempoReal()
            {
                var chat = $.ajax({
                    url:'cargarchat<?php echo ltrim($_SERVER['REQUEST_URI'],'/chat') ?>',
                    dataType:'text',
                    async:false
                }).responseText;

                document.getElementById("miChat").innerHTML = chat;
            }
            setInterval(tiempoReal, 2500);
        </script>
        <!-- Cabezal del chat -->
        <div class="container-flude">
            <div class="msg-group center">
                    <div id="miChat">
                        <!-- Loop de mensajes -->
                        
                        <!-- Loop de mensajes -->

                    </div>
                <br>
                <form id="formulario">
                    <div class="input-group">
                        <input type="hidden" id="chatAsignatura" name="chatAsignatura" value="<?php echo ltrim($_SERVER['REQUEST_URI'],'/chat'); ?>">
                        <textarea class="form-control" id="chatMensaje" name="chatMensaje" rows="3"></textarea>
                        <input class="btn btn-primary" value="Enviar" type="submit">
                    </div>
                </form>
            </div>
        </div>
        <?php if(ChatController::DevolverChatPorAsignatura(ltrim($_SERVER['REQUEST_URI'],'/chat')) -> userId == $_SESSION['usuarioId']): ?>
            <form action="/resolverchat" method="post">
                <input type="hidden" id="chatAsignatura" name="chatAsignatura" value="<?php echo ltrim($_SERVER['REQUEST_URI'],'/chat'); ?>">
                <input class="btn btn-primary" value="Resolver chat" type="submit">
            </form>
        <?php endif; ?>
        
    <?php endif; ?>
            
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
    <script>
        $(function(){
            $(".chat").niceScroll();
        }) 
    </script>
<?php require_once "footer.php"?>