<?php
    session_start();
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="principal">
        <div class="sidebar-brand-icon">
        </div>
        <div class="sidebar-brand-text mx-0">Esilum</div>
    </a>
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
    <?php foreach (AlumnoController::DevolverGruposDeAlumno() as $key => $valor) : ?>
        <?php if ($valor) : ?>
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span><?php echo $key ?></span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Materias</h6>
                        <?php foreach (AlumnoController::DevolverMateriasPorGrupo($key) as $key => $valor) : ?>
                            <a class="collapse-item" href="chat<?php echo $key ?>"><?php echo $key . " ";
                                                                                    echo ChatController::CheckearEstado($key) ? "OFF" : "ON"; ?> </a>
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