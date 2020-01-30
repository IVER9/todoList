<?php
require('../config/database.php');

class Todo {
    private $db;
    private $id;
    private $title;
    private $detail;
    private $status;

    public function __construct() {
        try {
            $this->db = new PDO(DSN, USERNAME, PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setDetail($detail) {
        $this->detail = $detail;
    }
    public function getDetail() {
        return $this->detail;
    }
    public function setStatus($status) {
        $this->status = $status;
    }
    public function getStatus() {
        return $this->status;
    }

    public function findByQuery($sql) {
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function save() {
        $sql = "INSERT INTO todo (title, detail, status, created_at) VALUES ('$this->title', '$this->detail', '0', NOW())";
        $statement = $this->db->prepare($sql);
        $statement->execute();
    }
    public function deleted() {
        $sql = "DELETE FROM todo WHERE (id = $this->id)";
        $statement = $this->db->prepare($sql);
        $statement->execute();
    }
    public function completion() {
        $sql = "UPDATE todo SET status = '$this->status' WHERE (id= '$this->id')";
        $statement = $this->db->prepare($sql);
        $statement->execute();
    }
}
 ?>
