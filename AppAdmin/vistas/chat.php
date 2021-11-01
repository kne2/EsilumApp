<?php require_once "principal.php"?>
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
    <?php if(ChatController::CheckearEstado(ltrim($_SERVER['REQUEST_URI'],'/chat'))): ?>
        <h1><span style="font-size: 20px;">No hay ningun chat creado de esta materia</span></h1>                    
    <?php endif; ?>
    <?php if(!ChatController::CheckearEstado(ltrim($_SERVER['REQUEST_URI'],'/chat'))): ?>
        <div class="card-body p-2 p-sm-3">
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
                        <textarea class="form-control" id="chatMensaje" name="chatMensaje" rows="2"></textarea>
                        <input class="btn btn-primary" value="Enviar" type="submit">
                    </div>
                </form>
            </div>
        </div>
        </div>  
        <form action="/resolverchat" method="post">
            <input type="hidden" id="chatAsignatura" name="chatAsignatura" value="<?php echo ltrim($_SERVER['REQUEST_URI'],'/chat'); ?>">
            <input class="btn btn-primary" value="Resolver chat" type="submit">
        </form>

    <?php endif; ?>
            
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
    <script>
        $(function(){
            $(".chat").niceScroll();
        }) 
    </script>
<?php require_once "footer.php"?>