<?php  
    require '../EsilumBackEnd/utils/autoloader.php';
    $request = $_SERVER['REQUEST_URI'];
    
    switch($request){
        case '/':
            UserController::MostrarMenuPrincipal();
            break;
        case '':
            UserController::MostrarMenuPrincipal();
            break;
        case '/login':
            
            if($_SERVER['REQUEST_METHOD'] === 'GET') UserController::MostrarLogin();  
            if($_SERVER['REQUEST_METHOD'] === 'POST') UserController::IniciarSesion($_POST['loginID'],$_POST['loginPassword']);
            
            break;
        case '/principal':
            UserController::MostrarMenuPrincipal();
            break;
        
        case "/registro":
            if($_SERVER['REQUEST_METHOD'] === 'GET') UserController::MostrarRegistro(); 
            if($_SERVER['REQUEST_METHOD'] === 'POST') UserController::AltaDeUsuario(str_replace('.', '', str_replace('-', '', $_POST['registerID'])),$_POST['registerNombre'],$_POST['registerApellido'],$_POST['registerEmail'],$_POST['registerPassword1'],$_POST['registerPassword2'],APP_USUARIO);
            break;

        case '/verconsultas':
            ConsultaController::ObtenerConsultas();
            break;

            
        case '/cerrarsesion':
            UserController::cerrarSesion();
            break;
        
        case '/perfil':
            UserController::MostrarPerfil();
            break;

        case '/editarperfil':
            if($_SERVER['REQUEST_METHOD'] === 'GET') UserController::MostrarEditarPerfil(); 
            if($_SERVER['REQUEST_METHOD'] === 'POST') UserController::EditarUser($_SESSION['usuarioId'],$_POST['profileNombre'],$_POST['profileApellido'],$_POST['profilePassword1'],$_POST['profilePassword2'],$_POST['profileEmail'],$_POST['profileAvatar']);
            break;
        
        case '/realizarconsulta':
            if($_SERVER['REQUEST_METHOD'] === 'GET') UserController::MostrarRealizarConsulta(); 
            if($_SERVER['REQUEST_METHOD'] === 'POST') ConsultaController::NuevaConsulta($_POST['consultaTitulo'],$_POST['consultaDescripcion']);
            break;
        
        default:
            switch (true){
                case strpos($request, '/consulta') === 0:
                    ConsultaController::MostrarConsulta(ltrim($request,'/consulta'));
                    #generarHtml("consulta",["consultaId" => ltrim($request,'/consulta')]);
                    break;
                         
                default:
                    if(isset($_SESSION['autenticado'])) cargarVista('404logged');
                    if(!isset($_SESSION['autenticado'])) header("Location: /login");
                    break;
            }
    }