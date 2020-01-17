<?php

require('./config/database.php');

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
    public function writeByQuery($sql) {
        $statement = $this->db->prepare($sql);
        $statement->execute();
    }

}
 ?>
