<html lang="es-SV">

    <head>
        <!-- Meta INFO -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
        <meta name="author" content="">
        <title>CLIDESA CMS</title>
        <!-- End of Meta INFO -->

		
		<!-- Start of CSS styleshets -->
    	<link href="<?php echo base_url('assets/css/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet" />
        <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.png')?>">
        <link href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/pages/dashboard1.css')?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/clidesa.css')?>" rel="stylesheet">
        <!-- End of CSS styleshets -->

        <!-- Extra BAD CSS -->
        <style>
            @media (max-width: 400px) { 
                .quit{
                    margin-top: -10px;
                }
            }
        </style>
        <!-- Extra BAD CSS -->


        
        <!-- Start of preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure" style="font-size: 10em;">
                </div>
               <p class="loader__label" ><img src="<?= base_url('assets/images/loader.png')?>"  style="color: blue; margin-top: -50%;">  </p>
               <p class="loader__label"style="color: blue;" > CLIDESA CMS </p>
            </div>
        </div>
        <!-- End of preloader -->
    <head>

    <!-- Start of body -->
    <body class="skin-default-dark fixed-layout bg-dark">
    
        <div id="main-wrapper bg-dark">
    
            <!-- Start of header of page -->
            <header class="topbar" >
                <nav class="navbar top-navbar navbar-expand-md navbar-dark" >
                    <!-- Start Top side logo -->
                    <div class="navbar-header ">
                        <a class="navbar-brand" href="index.php" >
                            <b>
                                <img src="<?= base_url('assets/images/logo-icon.png')?>" alt="homepage" class="dark-logo" />
                                <img src="<?= base_url('assets/images/logo-light-icon.png')?>" alt="homepage" class="light-logo" />
                            </b>
                        </a>
                    </div>
                    <!-- END Top side logo -->

                    <!-- Start of top second side navbar -->
                    <div class="navbar-collapse">
                        <!-- Start Navbar items -->
                        <ul class="navbar-nav mr-auto">
                            <!-- Search item -->
                            <li class="nav-item hidden-sm-up">
                                <a class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i></a>
                            </li>
                            <li class="nav-item search-box">
                                <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                                <form class="app-search">
                                    <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="fa fa-times"></i></a>
                                </form>
                            </li>
                        </ul>
                        <!-- User profile item -->
                        <ul class="navbar-nav my-lg-0 bg-dark" >
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt="user" class="img-circle" width="30"></a>
                            </li>
                        </ul>
                        <!-- Start Navbar items -->
                    </div>
                    <!-- End of second top side navbar -->

                </nav>
            </header>
            <!-- End of header of page -->

            <!-- Start of Side bar -->
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
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('')?>" aria-expanded="false"><i class="fa fa-home text-white" style="font-size: 2em; "></i><span class="hide-menu">HOME</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('usuario_controller/carga')?>" aria-expanded="false"><i class="fa fa-user-circle-o text-white" style="font-size: 2em;  "></i><span class="hide-menu">Usuarios</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('categoria_controller/index')?>" aria-expanded="false"><i class="fa fa-users text-white" style="font-size: 2em; "></i><span class="hide-menu"></span>Categorias</a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('tipo_controller/index')?>" aria-expanded="false"><i class="fa fa-gear text-white" style="font-size: 2em;; "></i><span class="hide-menu"></span>Tipo</a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('contacto_controller/index')?>" aria-expanded="false"><i class="fa fa-envelope text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Contacto</a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('cita_controller/index')?>" aria-expanded="false"><i class="fa fa-envelope text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Cita</a></li>

                            <li> <a class="waves-effect waves-dark" href="<?= base_url('services')?>" aria-expanded="false"><i class="fa fa-envelope text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Servicios</a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('application/views/panelControl/icon-fontawesome.html')?>" aria-expanded="false"><i class="fa fa-pencil text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Blog</a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('application/views/panelControl/pages-blank.html')?>" aria-expanded="false"><i class="fa fa-envelope text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Mensajes</a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('application/views/panelControl/pages-error-404.html')?>" aria-expanded="false"><i class="fa fa-info text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Acerca de</a></li>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <!-- END of Side bar -->
        </div>
            
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

    <!-- Start of page container -->
    <div class="page-wrapper">



