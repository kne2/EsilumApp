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
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>
        <title>Ɛsilum</title>
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="principal"> <div class="sidebar-brand-icon">
                </div> 
                <div class="sidebar-brand-text mx-0">Esilum</div> </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="principal"> <i class="fas fa-house-user"></i> <span>Inicio</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/realizarconsulta"> <i class="fas fa-edit"></i> <span>Realizar consulta</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/verconsultas"> <i class="fas fa-list"></i> <span>Ver consultas</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/grupos"> <i class="fas fa-users"></i> <span>Grupos</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Chat
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <?php foreach(AlumnoController::DevolverGruposDeAlumno() as $key => $valor) : ?>
                    <?php if($valor): ?>   
                        <li class="nav-item active">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                                <i class="fas fa-fw fa-folder"></i>
                                <span><?php echo $key?></span>
                            </a>
                                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Materias</h6>
                                    <?php foreach(AlumnoController::DevolverMateriasPorGrupo($key) as $key => $valor) : ?>
                                        <a class="collapse-item" href="chat<?php echo $key?>"><?php echo $key?></a>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach ?>

                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
                <!-- Sidebarchat start -->
                <!-- Sidebarchat end -->

            </ul>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usuarioNombre'] . " " . $_SESSION['usuarioApellido']?></span> <img class="img-profile rounded-circle" src="img/avatares/<?php echo $_SESSION['usuarioAvatar'] ?>.svg"> </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="/perfil"> <i class="fas fa-user"></i>
                                     Perfil </a>
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

                