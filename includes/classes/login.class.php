<?php

  class login extends db {

    public function signIn($pass) {

      $page = new page;
      $pass = $this -> connect() -> real_escape_string($pass);
      $result = $this -> connect() -> query("SELECT * FROM " . $this->usersTable . " WHERE pass= '" . $pass . "' ");

      if( mysqli_num_rows($result) == 1 ) {
        $data = mysqli_fetch_assoc($result);
        date_default_timezone_set("Europe/Vilnius");
        $date = date("Y-m-d H:i:s");
        $session = uniqid();
        $this -> connect() -> query(" INSERT INTO " . $this->visitsTable . " (`session`, `pass`, `person`, `date`)
                                      VALUES (
                                        '" . $session . "',
                                        '" . $pass . "',
                                        '" . $data['name'] . "',
                                        '" . $date . "'
                                      )");
        $page -> showInvitation($data, $session);
      }

      else {
        $page -> showLoginError('1');
      }

    }

    public function register($phone) {
      $communicate = new communication;
      $communicate -> sendRequest($phone);
      $page = new page;
      $page -> showLoginError('2');
    }

    public function enterCode() {
      $page = new page;
      $page -> showLogin();
    }

  }

?>
