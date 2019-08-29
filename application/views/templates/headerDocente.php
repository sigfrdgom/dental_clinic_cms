
<!DOCTYPE html>

<!-- IMPLEMENTACION DE SESIONES AUN SIN OPTIMIZACION-->
<?php
if ((session_status() == 2)&&(isset($_SESSION['id_sesion']))) { 

}else{
    session_start();
    if (isset($_SESSION['id_sesion'])) {
    }else{
    echo "<script> alert('NO ESTA AUTORIZADO');
         window.location='".RUTA_URL."';
        </script>";
        exit;}
}

?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLINICA CLIDESA</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo RUTA_URL; ?>/img/icons/test.png">

    <!-- Bootstrap CSS -->
    <link href="<?php echo RUTA_URL ?>/css/bootstrap/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome CSS -->
    <link href="<?php echo RUTA_URL ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet"  />

    <!-- Custom CSS -->
    <link href="<?php echo RUTA_URL ?>/assets/css/style.css" rel="stylesheet"  />
    
    <!-- CSS General para la pagina-->
    <link href="<?php echo RUTA_URL ?>/css/general.css" rel="stylesheet" >

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <!-- END CSS for this page -->

    <!-- Other CSS -->
    <link href="<?php echo RUTA_URL ?>/css/style.css" rel="stylesheet" type="text/css" />

    <script src="https://kit.fontawesome.com/3b0ecff6a4.js"></script>
    
    <style>
        
    </style>
</head>

<body class="adminbody-void">

<div id="main" class="enlarged forced">

    <!-- top bar navigation -->
    <div class="headerbar">

<!-- LOGO -->
<div class="headerbar-left" style="align-content: center;">
    <!-- <a href="<?php echo RUTA_URL ?>/index/index2" class="logo "><img alt="Logo" class="img-logo" style="border-radius: 3px;" src="<?php echo RUTA_URL ?>/img/logo/usaid-es-hd.png" /> <span>CDS NOTAS</span></a> -->
    <button class="button-menu-mobile open-left quit" >
        <i class="fa fa-fw fa-bars mt-0 ml-2 text-white"></i>
    </button>
</div>

<nav class="navbar-custom">
    
    <ul class="list-inline float-right mb-0">
        <li class="list-inline-item dropdown notif">
            
            <div class="row">
                <a class="nav-link dropdown-toggle nav-user"  href="<?php echo RUTA_URL ?>/index/index2" role="button" aria-haspopup="true" aria-expanded="true">
                    <img alt="Logo" class="img-logo" style="border-radius: 3px; width: 100px;" src="<?php echo RUTA_URL ?>/img/logo/usaid-es-hd.png" />
                </a>
                <a class="nav-link dropdown-toggle nav-user"  href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                    <img src="<?php echo RUTA_URL ?>/assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded">
                </a>
                <!-- El dropdown -->
                <div class="dropdown-menu dropdown-menu-right profile-dropdown" style="background: #c4cfdd; width: 300px;">
                    <div class="dropdown-item perfil_item ">
                        <small class="text-overflow"><i class="fas fa-shield-alt"></i><?php echo $_SESSION['tipoUsuario'] ?></small>
                    </div>
                    <div class="dropdown-item perfil_item text-justify">
                        <small class="text-overflow"><i class="fas fa-user"></i><?php echo $_SESSION['nombres']?></small>
                    </div>
                    <div class="cerrar_session">
                        <a href="<?php echo RUTA_URL ?>/Login/finalizarSesion" class="dropdown-item notify-item cerrar_session">
                            <i class="fa fa-power-off"></i> <span>Cerrar Sesión</span>
                        </a>
                    </div>
                </div>
            </div>
        </li>
    </ul>

    <!-- El menu hamburguer -->
    <!-- <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </li>
    </ul> -->

</nav>

</div>
    <!-- End Navigation -->


    <!-- Left Sidebar -->
    <div class="left main-sidebar">

        <div class="sidebar-inner leftscroll">

            <div id="sidebar-menu">
                <!-- <a href="<?php echo RUTA_URL; ?>/index/index2"><img alt="Logo" class="img-fgk" style="border-radius: 3px;" src="<?php echo RUTA_URL ?>/img/logo/fgk.png" /></a> -->

                <ul >
                    <li class="submenu">
                        <a href="<?php echo RUTA_URL?>/modulo"><i class="fa fa-fw fa-book"></i><span> Modulos </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL?>/participante"><i class="fa fa-fw fa-user"></i><span> Participantes </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL ?>/notas"><i class="fas fa-chart-line"></i></i><span> Notas </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL ?>/rankingNotas"><i class="fa fa-bar-chart bigfonts"></i><span> Ranking Notas </span> </a>
                    </li>

              
                    <li class="submenu">
                        <a href="<?php echo RUTA_URL ?>/reporte"><i class="fa fa-fw fa-print"></i><span> Reportes </span> </a>
                    </li>

                   
                    <li class="submenu">
                        <a href="<?php echo RUTA_URL ?>/general/faq"><i class="fa fa-question-circle-o bigfonts" style="font-size: 1.5em;"></i><span> FA&Q </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL ?>/general/acercaDe"><i class="fa fa-info-circle bigfonts" style="font-size: 1.5em;"></i><span> Sobre el proyecto </span> </a>
                    </li>

                </ul>

                <div class="clearfix"></div>

            </div>

            <div class="clearfix"></div>

        </div>

    </div>
    <!-- End Sidebar -->


    <div class="content-page">

        <!-- Start content -->