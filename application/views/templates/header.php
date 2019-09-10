<!DOCTYPE html>

<!-- IMPLEMENTACION DE SESIONES AUN INCOMPLETA -->
<?php
// if ((session_status() == 2)&&(isset($_SESSION['id_sesion']))) {   
//     // echo "<script> alert('HAY SESSION EN HEADER ".session_status()."');</script>";

// }else{
    
//     // echo "<script> alert(' NO HAY SESISION EN HEADER ".session_status()."');</script>";
    
//     if (session_status() != 2) {
//         session_start();
//     } 
    
//     if (isset($_SESSION['id_sesion'])) 
//     {
//         // echo "<script> alert('SI HAY SESIONES EN HEADER PERO NO HAY ID  ".session_status()."');</script>";
//     }else
//     {
//         echo "<script> alert('NO ESTA AUTORIZADO');
//         window.location='".RUTA_URL."';
//         </script>";
//         exit;
//     }
    
// }                                                
?>


<html lang="en">
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.png')?>">
        <title>CLIDESA CMS</title>
        <!-- This page CSS -->
        <!-- Custom CSS -->
        <link href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">
        <!-- <link href="" rel="stylesheet"> -->
        <!-- Dashboard 1 Page CSS -->
        <link href="<?= base_url('assets/css/pages/dashboard1.css')?>" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure" style="font-size: 10em;">
                </div>
               <p class="loader__label" ><img src="<?= base_url('assets/images/loader.png')?>"  style="color: blue; margin-top: -50%;">  </p>
               <p class="loader__label"style="color: blue;" > CLIDESA CMS </p>
               
                
                
            </div>
        </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    
    <div id="main-wrapper bg-dark">
    
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" >
            <nav class="navbar top-navbar navbar-expand-md navbar-dark" >
            <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header ">
                    <a class="navbar-brand" href="index.php" >
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url('assets/images/logo-icon.png')?>" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?= base_url('assets/images/logo-light-icon.png')?>" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="fa fa-times"></i></a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0 bg-dark" >
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt="user" class="img-circle" width="30"></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" style="background: #42baff91">
            <div class="d-flex no-block nav-text-box align-items-center bg-white">
                <span></span><img src="<?= base_url('assets/images/logo-icon.png')?>" alt="elegant admin template" width="40px" style="margin: 0% auto;"></span>
                <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i class="ti-menu"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)'"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar bg-dark">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('application/views/panelControl/index.php')?>" aria-expanded="false"><i class="fa fa-home text-white" style="font-size: 2em; "></i><span class="hide-menu">HOME</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('application/views/panelControl/pages-profile.html')?>" aria-expanded="false"><i class="fa fa-user-circle-o text-white" style="font-size: 2em;  "></i><span class="hide-menu">Perfil</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('application/views/panelControl/table-basic.html')?>" aria-expanded="false"><i class="fa fa-users text-white" style="font-size: 2em; "></i><span class="hide-menu"></span>Usuarios</a></li>
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('application/views/panelControl/icon-fontawesome.html')?>" aria-expanded="false"><i class="fa fa-pencil text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Blog</a></li>
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('application/views/panelControl/pages-blank.html')?>" aria-expanded="false"><i class="fa fa-envelope text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Mensajes</a></li>
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('application/views/panelControl/pages-blank.html')?>" aria-expanded="false"><i class="fa fa-gear text-white" style="font-size: 2em;; "></i><span class="hide-menu"></span>Configuración</a></li>
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('application/views/panelControl/pages-error-404.html')?>" aria-expanded="false"><i class="fa fa-info text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Acerca de</a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  
        <div class="cerrar_session">
                                <a href="php echo RUTA_URL ?>/Login/finalizarSesion" class="dropdown-item notify-item cerrar_session">
                                    <i class="fa fa-power-off"></i> <span>Cerrar Sesión</span>
                                </a>
                            </div>
                            <IfModule authz_core_module>
            Require all denied
            </IfModule>
            <IfModule !authz_core_module>
                Deny from all
                </IfModule>
                        -->
        <!-- ============================================================== -->


    <style>
        @media (max-width: 400px) { 
            .quit{
                margin-top: -10px;
            }
        }
    </style>
    </head>


    <!-- START THE BODY -->
    <body class="skin-default-dark fixed-layout bg-dark">
    
        <div class="page-wrapper">

