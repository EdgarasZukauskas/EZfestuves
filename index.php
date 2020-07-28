<?php

  session_start();

  spl_autoload_register( function($className) {
    include_once 'includes/classes/'.$className.'.class.php';
  });

    $login = new login;

    if(array_key_exists('pass', $_GET)){
      $login -> signIn($_GET['pass']);
    }

    elseif(array_key_exists('phone', $_GET)){
      $login -> register($_GET['phone']);
    }

    else {
      $login -> enterCode();
    }

?>
