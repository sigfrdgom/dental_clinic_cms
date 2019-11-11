<html lang="es-SV">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <!-- Meta INFO -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CLIDESA CMS</title>
    <!-- End of Meta INFO -->


    <!-- Start of CSS styleshets -->
    <link href="<?php echo base_url('assets/css/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.ico') ?>">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/pages/dashboard1.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/clidesa.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/dropify/css/dropify.min.css') ?>">

    <!-- End of CSS styleshets -->

    <!-- Extra BAD CSS -->
    <style>
        @media (max-width: 400px) {
            .quit {
                margin-top: -10px;
            }
        }
    </style>
    <!-- Extra BAD CSS -->

    <!-- Sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <head>

        <!-- Start of body -->

    <body class="skin-default-dark fixed-layout bg-dark">

        <!-- Start of preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure" style="font-size: 10em;">
                </div>
                <p class="loader__label"><img src="<?= base_url('assets/images/loader.png') ?>" style="color: blue; margin-top: -50%;"></p>
                <p class="loader__label" style="color: blue;"> CLIDESA CMS </p>
            </div>
        </div>
        <!-- End of preloader -->

        <div id="main-wrapper bg-dark">

            <!-- Start of header of page -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <!-- Start Top side logo -->
                    <div class="navbar-header py-2 px-4">
                        <a class="navbar-brand" href="<?= base_url('/InicioControl/index2') ?>">
                            <b>
                                <img src="<?= base_url('assets/images/logo-icon.png') ?>" alt="homepage" class="dark-logo" />
                                <img src="<?= base_url('assets/images/logo-light-icon.png') ?>" alt="homepage" class="light-logo" />
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
                                    <input type="text" id="globalBusqueda" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="fa fa-times"></i></a>
                                </form>
                            </li>
                        </ul>
                        <!-- User profile item -->


                        <!-- <ul class="navbar-nav my-lg-0 bg-info m-0" >
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<= // base_url('assets/images/users/1.jpg')>" alt="user" class="img-circle" width="50"></a>
                            </li>
						</ul> -->


                        <ul class="list-inline float-right mb-0 ml-5">
                            <li class="list-inline-item dropdown notif ml-5">

                                <div class="row ml-5">

                                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?= base_url('assets/images/login/imagenPerfil.png') ?>" alt="user" class="img-circle" width="50"></a>
                                    <!-- El dropdown -->
                                    <div class="dropdown-menu dropdown-menu-left profile-dropdown" style="background: #c4cfdd; width: 300px;">
                                        <div class="dropdown-item perfil_item ">
                                            <small class="text-overflow"><i class="fa fa-address-book"></i> <?= $this->session->userdata('tipo_usuario') ?></small>
                                        </div>
                                        <div class="dropdown-item perfil_item text-justify">
                                            <small class="text-overflow"><i class="fa fa-user"></i> <?= $this->session->userdata('nombre') ?></small>
                                        </div>
                                        <div class="cerrar_session">
                                            <a href="<?= base_url('InicioControl/finalizarSesion') ?>" class="dropdown-item notify-item cerrar_session">
                                                <i class="fa fa-power-off"></i> <span>Cerrar Sesión</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
                    <span></span><img src="<?= base_url('assets/images/logo-icon.png') ?>" alt="elegant admin template" width="40px" style="margin: 0% auto;"></span>
                    <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i class="ti-menu"></i></a>
                    <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)'"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar bg-dark">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <!-- <li> <a class="waves-effect waves-dark" href="<?= base_url('/InicioControl/index2') ?>" aria-expanded="false"><i class="fas fa-sms text-white" style="font-size: 2em; "></i><span class="hide-menu">MSJ Recientes</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('Contacto') ?>" aria-expanded="false"><i class="fa fa-envelope text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Mensajes</a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('Cita') ?>" aria-expanded="false"><i class="fas fa-calendar-check text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Citas</a></li> -->

                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-mail-bulk text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Mensajes</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li> <a href="<?= base_url('/InicioControl/index2') ?>" aria-expanded="false"><i class="fas fa-sms text-white" style="font-size: 1.5em; "></i><span class="hide-menu">SMS Recientes</span></a></li>
                                    <li> <a href="<?= base_url('Contacto') ?>" aria-expanded="false"><i class="fa fa-envelope text-white" style="font-size: 1.5em;  "></i><span class="hide-menu"></span>Mensajes</a></li>
                                    <li> <a href="<?= base_url('Cita') ?>" aria-expanded="false"><i class="fas fa-calendar-check text-white" style="font-size: 1.5em;  "></i><span class="hide-menu"></span>Citas</a></li>
                                </ul>
                            </li>

                            <!-- <li> <a class="waves-effect waves-dark" href="<?= base_url('HomePage') ?>" aria-expanded="false"><i class="fas fa-images text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Inicio</a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('services') ?>" aria-expanded="false"><i class="	fa fa-briefcase text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Servicios</a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('blog') ?>" aria-expanded="false"><i class="fas fa-blog text-white" style="font-size: 2em;"></i><span class="hide-menu"></span>Blog</a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('testimonials') ?>" aria-expanded="false"><i class="fas fa-handshake text-white" style="font-size: 2em;"></i><span class="hide-menu"></span>Testimonios</a></li> -->

                            <li class=""><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-marker text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Contenido</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li> <a href="<?= base_url('HomePage') ?>" aria-expanded="false"><i class="fas fa-images text-white" style="font-size: 1.5em;  "></i><span class="hide-menu"></span>Inicio</a></li>
                                    <li> <a href="<?= base_url('AboutUs') ?>" aria-expanded="false"><i class="fas fa-comment-alt text-white" style="font-size: 1.5em;"></i><span class="hide-menu"></span>Acerca de</a></li>
                                    <li> <a href="<?= base_url('services') ?>" aria-expanded="false"><i class="	fa fa-briefcase text-white" style="font-size: 1.5em;  "></i><span class="hide-menu"></span>Servicios</a></li>
                                    <li> <a href="<?= base_url('blog') ?>" aria-expanded="false"><i class="fas fa-blog text-white" style="font-size: 1.5em;"></i><span class="hide-menu"></span>Blog</a></li>
                                    <li> <a href="<?= base_url('testimonials') ?>" aria-expanded="false"><i class="fas fa-handshake text-white" style="font-size: 1.5em;"></i><span class="hide-menu"></span>Testimonios</a></li>
                                </ul>
                            </li>

                            <!-- <li> <a class="waves-effect waves-dark" href="<?= base_url('Usuario') ?>" aria-expanded="false"><i class="fas fa-users text-white" style="font-size: 2em;  "></i><span class="hide-menu">Usuarios</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('Categoria') ?>" aria-expanded="false"><i class="fa fa-list-ol text-white" style="font-size: 2em; "></i><span class="hide-menu"></span>Categorias</a></li>
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('Tipo') ?>" aria-expanded="false"><i class="fas fa-cog text-white" style="font-size: 2em;; "></i><span class="hide-menu"></span>Tipo</a></li> -->

							<div style="<?= ($this->session->userdata('tipo_usuario')=="ADMIN")?"":"display: none" ?>">

							<li> <a class="waves-effect waves-dark" href="<?= base_url('Bitacora') ?>" aria-expanded="false"><i class="fas fa-address-book text-white" style="font-size: 2em;  "></i><span class="hide-menu">Bitacora</span></a></li>
							
							<li> <a class="waves-effect waves-dark" href="<?= base_url('Usuario') ?>" aria-expanded="false"><i class="fas fa-users text-white" style="font-size: 2em;  "></i><span class="hide-menu">Usuarios</span></a></li>
							</div>
							
							<li class=""><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-cog text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Configuración</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li> <a href="<?= base_url('Categoria') ?>"><i class="fa fa-list-ol text-white" style="font-size: 1.5em; "></i><span class="hide-menu"></span>Categorias</a></li>
                                </ul>
                            </li>

                            <!-- <li> <a class="waves-effect waves-dark" href="<?= base_url('application/views/panelControl/pages-blank.html') ?>" aria-expanded="false"><i class="fa fa-envelope text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Mensajes</a></li> -->
                            <li> <a class="waves-effect waves-dark" href="<?= base_url('General/acercade') ?>" aria-expanded="false"><i class="fa fa-info text-white" style="font-size: 2em;  "></i><span class="hide-menu"></span>Acerca de</a></li>
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
