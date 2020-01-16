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
    public function findByQuery($query) {
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}
 ?>
