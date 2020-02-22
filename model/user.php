<?php
require('../../config/database.php');

class User {
    private $db;
    private $name;
    private $password;

    public function __construct() {
        try {
            $this->db = new PDO(DSN, USERNAME, PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->db->rollBack();
            exit('接続エラー');
        }
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

    public function getAll() {
        $sql = "SELECT * FROM user ";
        $user = $this->db->query($sql);
        return $user;
    }
    public static function checkUser($name, $password) {
        $sql = "SELECT * FROM user WHERE name='$name' AND password='$password'";
        $db = new PDO(DSN, USERNAME, PASSWORD);
        $statement = $db->query($sql);
        $user= $statement->fetch();
        if (!$user) {
            return false;
        }else {
            return true;
        }
    }
    public function registration() {
        $this->db->beginTransaction();
        $sql = "INSERT INTO user (name, password, created_at) VALUES ('$this->name', '$this->password', NOW())";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $this->db->commit();
    }
}

 ?>
