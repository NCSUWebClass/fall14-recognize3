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

  public function conn() {
    return $this->connection;
  }

  private function selectStarTable($table) {
    $stmt = $this->conn()->prepare("SELECT * from $table");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function viewGalleries() {
    return $this->selectStarTable("galleries");
  }

  public function viewQuestions() {
    return $this->selectStarTable("questions");
  }

  public function viewGallery($id) {
    $stmt = $this->conn()->prepare("SELECT * from galleries WHERE id=:id");
    $stmt->execute([
      'id' => $id
    ]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function getAnswer($aid) {
    $stmt = $this->conn()->prepare("SELECT * from answers WHERE id=:id LIMIT 1");
    $stmt->execute([
      'id' => $aid
      ]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) return false;
    return $rows[0];
  }

  public function getRandomAnswers($gallery_id) {
    $stmt = $this->conn()->prepare("SELECT * from answers WHERE gallery_id=:gallery_id ORDER BY RAND() LIMIT 2");
    $stmt->execute([
      'gallery_id' => $gallery_id
      ]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) return false;
    return $rows;
  }

  public function viewQuestionsInGallery($gallery_id) {
    $stmt = $this->conn()->prepare("SELECT * from questions WHERE gallery_id = :gallery_id");
    $stmt->execute([
      'gallery_id' => $gallery_id
      ]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function viewQuestion($question_id) {
    /// TODO Join with Answers table to get the right answer and other answers
    $stmt = $this->conn()->prepare("SELECT * from questions WHERE id = :id");
    $stmt->execute([
      'id' => $question_id
      ]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }
}
