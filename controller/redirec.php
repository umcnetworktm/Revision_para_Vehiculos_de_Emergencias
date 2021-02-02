<?php

  session_start();



  if($_SESSION['estado'] == 'Activo'){
    if($_SESSION['t_factor'] == '0'){

      if($_SESSION['cargo'] == 1){
        header('location: ../view/admin/');
      }else if($_SESSION['cargo'] == 2){
        header('location: ../view/user/');
      }

    }elseif ($_SESSION['t_factor'] == '1') {
        header('location: ../view/t_factor/');
    }
  }elseif ($_SESSION['estado'] == 'Inactivo') {
      header('location: ../view/status/');
  }


 ?>
