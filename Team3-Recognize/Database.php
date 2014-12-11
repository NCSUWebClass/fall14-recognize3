<?php

class Database {
  private $host = 'localhost';

  private $username = 'root';

  private $password = '';

  private $dbname = 'recognize';

  private $connection;

  private $schema = 0.1;

  public function __construct() {
    $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
  }
  
  public function getConnection() {
    return $this->connection;
  }

}
