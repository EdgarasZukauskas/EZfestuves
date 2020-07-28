<?php

  class page extends login {

    protected function showLogin(){
      include 'includes/pages/login.page.php';
    }

    protected function showInvitation($data, $session){
      include_once 'includes/pages/invitation.page.php';
    }

    protected function showLoginError($code){
      $error = $code;
      include_once 'includes/pages/login.page.php';
    }

    public function logVisits($data){
      $data = json_decode(file_get_contents('php://input'), true);
      $session = $this -> connect() -> real_escape_string($data["session"]);
      $section = $this -> connect() -> real_escape_string($data["section"]);
      $section = $section.' skyrius';
      $this -> connect() -> query("UPDATE " . $this->visitsTable . " SET `" . $section . "` = '1' WHERE `session` = '" . $session . "'");
    }

  }

?>
