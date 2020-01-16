<?php
require('./model/todo.php');

class TodoController {
    public function index() {
        $todoData = new Todo();
        return $todoData -> findByQuery('SELECT * FROM todo');
    }

}

 ?>
