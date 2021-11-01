<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Ɛsilum</title>
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body class="bg-gradient-primary">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Crea tu cuenta</h1>
                                </div>
                                <?php if(isset($parametros['falla']) && $parametros['falla'] == true): ?>
                                             <div style="color: #FF0000"> Casillero/s incorrectos</div>
                                <?php endif; ?>
                                <form action="/registro" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                           <!-- Cambiar esto después de actualizar tabla usuario-->
                                            <input type="text" class="form-control form-control-user" id="nombreinput" placeholder="Nombre" name="registerNombre">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="apellidoinput" placeholder="Apellido" name="registerApellido">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="cedulainput" placeholder="Cedula de identidad sin puntos ni guiones" name="registerID" minlength="8" maxlength="8" onkeypress="return onlyNumberKey(event)">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="emailinput" placeholder="Email" name="registerEmail">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="passwordinput1" placeholder="Contraseña" name="registerPassword1">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="passwordinput2" placeholder="Repite tu contraseña" name="registerPassword2">
                                        </div>
                                    </div>
                                    <input class="btn btn-block btn-primary btn-user" data-pg-name="Ingresa" title="test" input type="submit" value="Registrarse">
                                    <hr>
                                </form>
                                <div class="text-center">
</div>
                                <div class="text-center">
                                    <a class="small" href="/login" target="_pg_blank">Ya tienes una cuenta? Logueate!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function onlyNumberKey(evt) {
                
                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }
        </script>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html>