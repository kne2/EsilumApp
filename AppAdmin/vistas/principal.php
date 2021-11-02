<?php 
    session_start();
?>
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
    <body id="page-top" class="dark">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="principal">
                <div class="sidebar-brand-icon">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px" y="0px" viewBox="0 0 850.4 850.4" style="enable-background:new 0 0 850.4 850.4;"
                    xml:space="preserve">

                    <path id="XMLID_3_" class="st0" d="M655.5,595.4l-6.3,85c-58.4,33.4-132.6,50.1-222.7,50.1c-163.7,0-245.5-59-245.5-177
            c0-44,12.8-78.8,38.4-104.4c25.6-25.6,55.3-41.6,89.1-47.9v-6.3c-78.7-18.6-118-62.8-118-132.6c0-54.1,22.9-96.2,68.8-126.2
            c45.9-30,111.1-45,195.7-45c69.8,0,131.3,7.4,184.6,22.2l-15.9,88.8c-54.6-19-112.9-28.5-175.1-28.5c-99.8,0-149.7,25.8-149.7,77.4
            c0,67.7,60.3,101.5,180.8,101.5c26.2,0,58.4-1.9,96.4-5.7L564.1,440c-30.9-5.1-59-7.6-84.4-7.6c-66.8,0-115.2,8.5-145.3,25.4
            c-30,16.9-45,44.4-45,82.5c0,69.4,54.6,104,163.7,104C512.3,644.2,579.7,628,655.5,595.4z" />
                </svg>
                </div> 
                <div class="sidebar-brand-text mx-0">Esilum</div> </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="principal"> <i class="fas fa-house-user"></i> <span>Inicio</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/verconsultas"> <i class="fas fa-list"></i> <span>Ver consultas</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/listarusuarios"> <i class="fas fa-user-check"></i> <span>Listado de Usuarios</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/usuariospendientes"> <i class="fas fa-user-check"></i> <span>Aprovar usuarios</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/grupospendientes"> <i class="fas fa-user-check"></i> <span>Aprovar Grupos</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/asignaturaspendientes"> <i class="fas fa-user-check"></i> <span>Aprovar Asignaturas</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Chat
                </div>

                <!-- Nav Item - Pages Collapse Menu --> 
                        <li class="nav-item active">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Asignaturas</span>
                            </a>
                                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                                <div class="py-2 collapse-inner rounded">
                                    <?php foreach(AdminController::DevolverMaterias() as $key => $valor) : ?>
                                            <a class="collapse-item" href="chat<?php echo $key?>"><?php echo $key." "; echo ChatController::CheckearEstado($key) ? '<i style="float: right">🔴 </i>' : '<i style="float: right">🟢</i>'; ?> </a>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </li>
                
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="mr-2 d-none d-lg-inline small"><?php echo $_SESSION['usuarioNombre'] . " " . $_SESSION['usuarioApellido']?></span> <img class="img-profile rounded-circle" src="img/avatares/<?php echo $_SESSION['usuarioAvatar'] ?>.svg"> </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="/perfil"> <i class="fas fa-user"></i>
                                        Perfil </a>
                                    <div class="dropdown-divider"></div>
                                    <a id="themeButton" class="dropdown-item" href="#"> <i class="fas fa-moon"></i>
                                        Tema </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/cerrarsesion"> <i class="fas fa-sign-out-alt"></i>
                                        Cerrar sesión </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->

                    <!-- Fin de pagina principal -->

                