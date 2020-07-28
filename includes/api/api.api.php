<?php

  spl_autoload_register( function($className) {
    include_once '../classes/'.$className.'.class.php';
  });

  $data = json_decode(file_get_contents('php://input'), true);

  if (array_key_exists('api', $data)){

    switch ($data['api']) {

      case 'sendInvitation':
        $communicate = new communication;
        $communicate -> sendInvitation($data);
        break;

      case 'sendRequest':
        $communicate = new communication;
        $communicate -> sendRequest($data);
        break;

      case 'logVisits':
        $communicate = new page;
        $communicate -> logVisits($data);
        break;
    }

  }

?>
