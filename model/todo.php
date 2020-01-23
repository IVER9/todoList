<?php
require('../config/database.php');

class Todo {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO(DSN, USERNAME, PASSWORD);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function findByQuery($sql) {
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function save($param1, $param2) {
        $sql = "INSERT INTO todo (title, detail, status, created_at) VALUES ('$param1', '$param2', '0', NOW())";
        $statement = $this->db->prepare($sql);
        return $statement->execute();
    }
    public function deleted($id) {
        $sql = "DELETE FROM todo WHERE (id = '$id')";
        $statement = $this->db->prepare($sql);
        return $statement->execute();
    }
    public function completion($id, $status) {
        $sql = "UPDATE todo SET status = '$status' WHERE (id= '$id')";
        $statement = $this->db->prepare($sql);
        return $statement->execute();
    }
}
 ?>
