<?php

  session_start();
  include_once('defined.php');

  if(isset($_SESSION['id'])){
    header('location: controller/redirec.php');
  }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Iniciar Sesión | PRVE LLC.</title>

    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="<?=BASE_URL?>public/css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
    <link rel="stylesheet" href="<?=BASE_URL?>public/css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="<?=BASE_URL?>public/css/login.css">
    <link rel="stylesheet" href="<?=BASE_URL?>public/css/style.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&display=swap">

</head>

<body>
    <!-- Formulario Login -->
    <section>

        <div class="box">

            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="square" style="--i:5;"></div>

            <div class="container">
                <div class="form">
                    <h2>PRVE LLC.</h2>
                    <div class="inputBx">
                        <input type="text" id="user" placeholder="Usuario">
                        <img src="https://www.flaticon.com/svg/static/icons/svg/709/709699.svg" alt="user">
                    </div>
                    <div class="inputBx password">
                        <input id="clave" type="password" name="password" placeholder="Contraseña">
                        <img src="https://www.flaticon.com/svg/static/icons/svg/1828/1828471.svg" alt="lock">
                    </div>
                    <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
                    <center>
                        <div class="row" id="load" hidden="hidden">
                            <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                                <img src="<?=BASE_URL?>public/img/loading.gif" width="100%" alt="Load">
                            </div>
                        </div>
                    </center>
                    <!-- Fin load -->
                    <div class="inputBx">
                        <input type="submit" id="login" value="Ingresar">
                    </div>

                    <p>¿Ólvidate la contraseña? <a href="#">Recuperar</a></p>
                    <p>¡Aun no tienes una cuenta! <a href="#">Registrarme</a></p>
                </div>
            </div>

        </div>
    </section>
    <!-- / Final Formulario login -->

    <!-- Jquery -->
    <script src="<?=BASE_URL?>public/js/jquery.js"></script>
    <!-- SweetAlert js -->
    <script src="<?=BASE_URL?>public/js/sweetalert.min.js"></script>
    <!-- Js personalizado -->
    <script src="<?=BASE_URL?>public/js/operaciones.js"></script>

</body>

</html>