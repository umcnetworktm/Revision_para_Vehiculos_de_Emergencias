<?php
  include_once('../../defined.php');
  // Se prendio esta mrd :v
  session_start();

  if(!isset($_SESSION['estado']) || $_SESSION['estado'] != 'Activo'){
    header('location: ../../index.php');
    if (!isset($_SESSION['t_factor']) || $_SESSION['t_factor'] != 0) {
      header('location: ../../index.php');

      // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
      if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1){
        /*
          Para greenireccionar en php se utiliza header,
          pero al ser datos enviados por cabereza debe ejecutarse
          antes de mostrar cualquier informacion en el DOM es por eso que inserto este
          codigo antes de la estructura del html, espero haber sido claro
        */
        header('location: ../../index.php');
      }
  
    }
  }


  

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Panel Administrativo | PRVE LLC.</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=BASE_URL?>public/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=BASE_URL?>public/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=BASE_URL?>public/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?=BASE_URL?>public/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=BASE_URL?>public/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?=BASE_URL?>public/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-green">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Por favor espere...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index">PANEL ADMINISTRATIVO - <?=$_SESSION['region']?>,
                    <?=$_SESSION['comite']?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i
                                class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">1</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICACIONES</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">Ver todas las notificaciones</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?=BASE_URL?>public/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=$_SESSION['nombre']?>
                        <?php
                      if($_SESSION['verificado'] == '1'){
                        echo '<span class="material-icons" style="font-size:14px;" title="Usuario verificada">
                                verified
                              </span>';
                      }
                    ?>
                    </div>
                    <div class="email"><a href="mailto:<?=$_SESSION['correo']?>"
                            style="text-decoration:none;color:#fff;"
                            title="Enviar un correo a: <?=$_SESSION['correo']?> "><?=$_SESSION['correo']?></a></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">keyboard_arrow_down</i>
                        <br>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?=BASE_URL?>view/admin/profile/"><i
                                        class="material-icons">person</i>Perfil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?=BASE_URL?>controller/cerrarSesion"><i class="material-icons">input</i>Cerrar
                                    Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">PANEL DE NAVEGACIÓN</li>
                    <li class="active">
                        <a href="index">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons">group</i>
                            <span>Personal</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons">directions_car</i>
                            <span>Flota Vehícular</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">library_add_check</i>
                            <span>Revisiones</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Mecánicas</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Equipo</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Daños</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Extravío</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>E.P.P</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">library_books</i>
                            <span>Boletas</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Mecánicas</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Equipo</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Daños</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Extravío</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>E.P.P</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?= BASE_URL?>view/admin/profile/institution/">
                            <i class="material-icons col-light-blue">supervised_user_circle</i>
                            <span class="col-light-blue">Perfil Institucional</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL?>view/admin/app/info/">
                            <i class="material-icons col-light-blue">donut_large</i>
                            <span>Información</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    <a href="javascript:void(0);">Panel Administrativo | <?=$_SESSION['comite']?></a>
                    <br> &copy; 2018 - <?=date('Y')?> .
                </div>
                <div class="version">
                    <b>Version: </b> 1.10.5-release
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PANEL DE CONTROL</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people_alt</i>
                        </div>
                        <div class="content">
                            <div class="text">PERSONAL</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">directions_car</i>
                        </div>
                        <div class="content">
                            <div class="text">FLOTA VEHÍCULAR</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">text_snippet</i>
                        </div>
                        <div class="content">
                            <div class="text">REVISION MECÁNICA</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">topic</i>
                        </div>
                        <div class="content">
                            <div class="text">REVISION EQUIPO</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">description</i>
                        </div>
                        <div class="content">
                            <div class="text">REVISION DAÑOS</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">find_in_page</i>
                        </div>
                        <div class="content">
                            <div class="text">REVISION EXTRAVIO</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="info-box bg-light-other hover-expand-effect text-center">
                        <div class="icon">
                            <i class="material-icons">masks</i>
                        </div>
                        <div class="content">
                            <div class="text">REVISION DEL EQUIPO DE PROTECCIÓN PERSONAL</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            <div class="row clearfix">
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="body bg-blue">
                            <div class="sparkline" data-type="line" data-spot-Radius="4"
                                data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                                data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)"
                                data-spot-Color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px"
                                data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                data-fill-Color="rgba(0, 188, 212, 0)">
                                REVISIONES MECÁNICAS
                            </div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    HOY
                                    <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    AYER
                                    <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    ESTE MES
                                    <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="body bg-blue">
                            <div class="sparkline" data-type="line" data-spot-Radius="4"
                                data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                                data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)"
                                data-spot-Color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px"
                                data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                data-fill-Color="rgba(0, 188, 212, 0)">
                                REVISIONES EQUIPO
                            </div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    HOY
                                    <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    AYER
                                    <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    ESTE MES
                                    <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="sparkline" data-type="line" data-spot-Radius="4"
                                data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                                data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)"
                                data-spot-Color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px"
                                data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                data-fill-Color="rgba(0, 188, 212, 0)">
                                REVISIONES DAÑOS
                            </div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    HOY
                                    <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    AYER
                                    <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    ESTE MES
                                    <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="sparkline" data-type="line" data-spot-Radius="4"
                                data-highlight-Spot-Color="rgb(23, 130, 99)" data-highlight-Line-Color="#fff"
                                data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)"
                                data-spot-Color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px"
                                data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                data-fill-Color="rgba(0, 188, 212, 0)">
                                REVISIONES EXTRAVÍO
                            </div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    HOY
                                    <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    AYER
                                    <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    ESTE MES
                                    <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="sparkline" data-type="line" data-spot-Radius="4"
                                data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                                data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)"
                                data-spot-Color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px"
                                data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                data-fill-Color="rgba(0, 188, 212, 0)">
                                REVISIONES E.P.P
                            </div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    HOY
                                    <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    AYER
                                    <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    ESTE MES
                                    <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?=BASE_URL?>public/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=BASE_URL?>public/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?=BASE_URL?>public/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?=BASE_URL?>public/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=BASE_URL?>public/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?=BASE_URL?>public/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?=BASE_URL?>public/plugins/raphael/raphael.min.js"></script>
    <script src="<?=BASE_URL?>public/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?=BASE_URL?>public/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?=BASE_URL?>public/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?=BASE_URL?>public/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?=BASE_URL?>public/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?=BASE_URL?>public/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?=BASE_URL?>public/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?=BASE_URL?>public/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="<?=BASE_URL?>public/js/admin.js"></script>
    <script src="<?=BASE_URL?>public/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="<?=BASE_URL?>public/js/demo.js"></script>
</body>

</html>