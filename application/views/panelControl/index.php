<!DOCTYPE html>
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
</head>

<body class="skin-default-dark fixed-layout bg-dark">
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
                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light" href="<?= base_url('javascript:void(0)')?>"><i class="ti-menu"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="<?= base_url('javascript:void(0)')?>"><i class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="fa fa-times"></i></a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0" style="background: #24264b">
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
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="<?= base_url('javascript:void(0)')?>"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" style="background: #24264b">
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
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles" style="background: #009ffb3f" >
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor text-dark">Dashboard</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right text-dark">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb tex-dark">
                                <li class="breadcrumb-item text-dark"><a href="<?= base_url('javascript:void(0)')?>">Home</a></li>
                                <li class="breadcrumb-item">></li>
                                <li class="breadcrumb-item">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!--  -->
                <!-- ============================================================== -->
                <div class="row">
                   
                    <!-- ============================================================== -->
                    <!-- Appointment request -->
                    <!-- ============================================================== -->
                    <div class="col-lg-5">
                        <div class="card" style="background: #42baff62">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Solicitudes de citas</h5>
                
                                <div class="steamline m-t-40">

                                    <div class="sl-item bg-white">
                                        <div class="sl-left bg-success"> <i class="fa fa-user"></i></div>
                                        <div class="sl-right">
                                            <div class="font-medium pt-3">Action <span class="sl-date">5 minutes ago</span></div>
                                            <div class="desc">Lorem Ipsum is simply
                                                <br><btn class="btn m-t-10 m-r-5 btn-rounded btn-success">Aceptar</btn> <btn class="btn m-t-10 btn-rounded btn-danger">Rechazar</btn> </div>
                                        </div>
                                    </div>

                                    <div class="sl-item bg-white">
                                        <div class="sl-left bg-info"><i class="fa fa-image"></i></div>
                                        <div class="sl-right">
                                            <div class="font-medium pt-3">Action <span class="sl-date">15 minutes ago</span></div>
                                            <div class="desc">Lorem Ipsum is simply
                                                <br><btn class="btn m-t-10 m-r-5 btn-rounded btn-success">Aceptar</btn> <btn class="btn m-t-10 btn-rounded btn-danger">Rechazar</btn> </div>
                                        </div>
                                    </div>

                                    <div class="sl-item bg-white">
                                        <div class="sl-left"> <img class="img-circle" alt="user" src="<?= base_url('assets/images/users/1.jpg')?>"> </div>
                                        <div class="sl-right">
                                            <div class="font-medium pt-3">Action <span class="sl-date">23 minutes ago</span></div>
                                            <div class="desc">Lorem Ipsum is simply
                                                <br><btn class="btn m-t-10 m-r-5 btn-rounded btn-success">Aceptar</btn> <btn class="btn m-t-10 btn-rounded btn-danger">Rechazar</btn> </div>
                                        </div>
                                    </div>

                                    <div class="sl-item bg-white">
                                        <div class="sl-left"> <img class="img-circle" alt="user" src="<?= base_url('assets/images/users/2.jpg')?>"> </div>
                                        <div class="sl-right">
                                            <div class="font-medium pt-3">Action <span class="sl-date">1 hour ago</span></div>
                                            <div class="desc">Lorem Ipsum is simply
                                                <br><btn class="btn m-t-10 m-r-5 btn-rounded btn-success">Aceptar</btn> <btn class="btn m-t-10 btn-rounded btn-danger">Rechazar</btn> </div>
                                        </div>
                                    </div>

                                    <div class="sl-item bg-white">
                                        <div class="sl-left"> <img class="img-circle" alt="user" src="<?= base_url('assets/images/users/3.jpg')?>"> </div>
                                        <div class="sl-right">
                                            <div class="font-medium pt-3">Action <span class="sl-date">1 hour, 5 minutes ago</span></div>
                                            <div class="desc">Lorem Ipsum is simply
                                                <br><btn class="btn m-t-10 m-r-5 btn-rounded btn-success">Aceptar</btn> <btn class="btn m-t-10 btn-rounded btn-danger">Rechazar</btn> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================================== -->
                    <!-- Received messages -->
                    <!-- ============================================================== -->
                    <div class="col-lg-7">
                        <div class="card" style="background: #42baff56">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Mensajes</h5>
                                <div class="message-box">
                                    <div class="message-widget message-scroll">
                                        <!-- Message -->
                                        <div class="bg-white p-4 my-2" style="border-radius: 10px;">
                                            <!-- <div class="user-img"> <img src="assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div> -->
                                            <div class="mail-contnet">
                                                <h5 class="text-dark">John Doe</h5> <span class="mail-desc text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam rem deleniti iure quaerat culpa et ea dolore nulla nisi? </span> <br> <span class="time">9:30 AM</span> 
                                                <br><btn class="btn m-t-10 m-r-5 btn-rounded btn-success">Aceptar</btn> <btn href="../../../javascript:void(0)" class="btn m-t-10 btn-rounded btn-danger">Rechazar</btn> 
                                            </div>
                                        </div>

                                        <!-- Message -->
                                        <div class="bg-white p-4 my-2" style="border-radius: 10px;">
                                            <!-- <div class="user-img"> <img src="assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div> -->
                                            <div class="mail-contnet">
                                                <h5 class="text-dark">Clark Kent</h5> <span class="mail-desc text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam rem deleniti iure quaerat culpa et ea dolore nulla nisi? </span> <span class="time">9:30 AM</span> 
                                                <br><btn class="btn m-t-10 m-r-5 btn-rounded btn-success">Aceptar</btn> <btn href="../../../javascript:void(0)" class="btn m-t-10 btn-rounded btn-danger">Rechazar</btn> 
                                            </div>
                                        </div>

                                        <!-- Message -->
                                        <div class="bg-white p-4 my-2" style="border-radius: 10px;">
                                            <!-- <div class="user-img"> <img src="assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div> -->
                                            <div class="mail-contnet">
                                                <h5 class="text-dark">Maria Keys</h5> <span class="mail-desc text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam rem deleniti iure quaerat culpa et ea dolore nulla nisi? </span> <span class="time">9:30 AM</span> 
                                                <br><btn class="btn m-t-10 m-r-5 btn-rounded btn-success">Aceptar</btn> <btn href="../../../javascript:void(0)" class="btn m-t-10 btn-rounded btn-danger">Rechazar</btn> 
                                            </div>
                                        </div>

                                        <!-- Message -->
                                        <div class="bg-white p-4 my-2" style="border-radius: 10px;">
                                            <!-- <div class="user-img"> <img src="assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div> -->
                                            <div class="mail-contnet">
                                                <h5 class="text-dark">Damariz Reynolds</h5> <span class="mail-desc text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam rem deleniti iure quaerat culpa et ea dolore nulla nisi? </span> <span class="time">9:30 AM</span> 
                                                <br><btn class="btn m-t-10 m-r-5 btn-rounded btn-success">Aceptar</btn> <btn href="../../../javascript:void(0)" class="btn m-t-10 btn-rounded btn-danger">Rechazar</btn> 
                                            </div>
                                        </div>

                                        <!-- Message -->
                                        <div class="bg-white p-4 my-2" style="border-radius: 10px;">
                                            <!-- <div class="user-img"> <img src="assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div> -->
                                            <div class="mail-contnet">
                                                <h5 class="text-dark">Ronald Tejada</h5> <span class="mail-desc text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam rem deleniti iure quaerat culpa et ea dolore nulla nisi? </span> <span class="time">9:30 AM</span> 
                                                <br><btn class="btn m-t-10 m-r-5 btn-rounded btn-success">Aceptar</btn> <btn href="../../../javascript:void(0)" class="btn m-t-10 btn-rounded btn-danger">Rechazar</btn> 
                                            </div>
                                        </div>

                                        <!-- Message -->
                                        <div class="bg-white p-4 my-2" style="border-radius: 10px;">
                                            <!-- <div class="user-img"> <img src="assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div> -->
                                            <div class="mail-contnet">
                                                <h5 class="text-dark">Esperanza Rios</h5> <span class="mail-desc text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam rem deleniti iure quaerat culpa et ea dolore nulla nisi? </span> <span class="time">9:30 AM</span> 
                                                <br><btn class="btn m-t-10 m-r-5 btn-rounded btn-success">Aceptar</btn> <btn href="../../../javascript:void(0)" class="btn m-t-10 btn-rounded btn-danger">Rechazar</btn> 
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>

        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © CLIDESA CMS
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
  
    <script src="<?= base_url('assets/jquery/jquery-3.2.1.min.js')?>"></script>
    <script src="<?= base_url('assets/popper/popper.min.js')?>"></script>
    <script src="<?= base_url('assets/css/bootstrap/assets/js/bootstrap.min.js')?>"></script>
    
    
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url('assets/js/perfect-scrollbar.jquery.min.js')?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('assets/js/waves.js')?>"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('assets/js/sidebarmenu.js')?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets/js/custom.min.js')?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    
    <!-- Chart JS -->
    <script src="<?= base_url('assets/js/dashboard1.js')?>"></script>
</body>

</html>
