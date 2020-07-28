<?php
  class db {

    private $servername = 'XXXXXX';
    private $username = 'XXXXXX';
    private $password = 'XXXXXX';
    private $dbName = 'XXXXXX';
    protected $textsTable = 'texts';
    protected $usersTable = 'users';
    protected $visitsTable = 'visits';

    protected function connect() {
      $connect = new mysqli($this->servername, $this->username, $this->password, $this->dbName);
      return $connect;
    }
  }
?>
