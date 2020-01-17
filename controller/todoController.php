<?php
require('./model/todo.php');

class TodoController {
    public function index() {
        $todoData = new Todo();
        return $todoData -> findByQuery('SELECT * FROM todo');
    }
    public function new($title, $detail) {
        $todoData = new Todo();
        $todoData->writeByQuery("INSERT INTO `todolist`.`todo` (`title`, `detail`) VALUES ('$title', '$detail')");
    }

}

 ?>
