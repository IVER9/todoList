<?php
require('../config/database.php');

class Todo {
    private $db;
    private $id;
    private $title;
    private $detail;
    private $status;
    private $name;
    private $password;

    public function __construct() {
        try {
            $this->db = new PDO(DSN, USERNAME, PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->db->rollBack();
            exit($e->getMessage());
        }
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
    public function checkId($id){
        $sql = "SELECT * FROM todo WHERE id='$id'";
        $result = $this->findByQuery($sql);
        if (!$result) {
            return false;
        }
        foreach ($result as $value) {
            return $value['id'];
        }
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
    public function setName($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function getPassword() {
        return $this->password;
    }
    public function findByQuery($sql) {
        $this->db->beginTransaction();
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $this->db->commit();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function save() {
        $this->db->beginTransaction();
        $sql = "INSERT INTO todo (title, detail, status, created_at) VALUES ('$this->title', '$this->detail', '0', NOW())";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $this->db->commit();
    }
    public function delete() {
        $this->db->beginTransaction();
        $sql = "DELETE FROM todo WHERE (id = $this->id)";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $this->db->commit();
    }
    public function completion() {
        $this->db->beginTransaction();
        $sql = "UPDATE todo SET status = '$this->status' WHERE (id= '$this->id')";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $this->db->commit();
    }
    public function registration() {
        $this->db->beginTransaction();
        $sql = "INSERT INTO user (name, password, created_at) VALUES ('$this->name', '$this->password', NOW())";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $this->db->commit();
    }
    public function checkUser() {
        $sql = "SELECT * FROM user WHERE name='$this->name' AND password='$this->password'";
        $user = $this->findByQuery($sql);
        return $user;
    }
}
 ?>
