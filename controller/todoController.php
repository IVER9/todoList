<?php
require('../model/todo.php');

class TodoController {
    public function index() {
        $todoData = new Todo();
        return $todoData -> findByQuery('SELECT * FROM todo');
    }
    public function new() {
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        $todoData = new Todo();
        return $todoData->save($title, $detail);
    }
    public function delete() {
        $id = $_POST["id"];
        $todoData = new Todo();
        return $todoData->deleted($id);
    }
    public function done() {
        $done_id = $_POST['status'];
        $sql = "SELECT * FROM todo WHERE id = '$done_id'";
        $todoData = new Todo();
        $todos = $todoData->findByQuery($sql);
        foreach ($todos as $todo) {
        }
        $id = $todo['id'];
        $status = $todo['status'];
        if ($status === "0") {
            $done_status = "1";
        }
        if ($status === "1") {
            $done_status = "0";
        }
        return $todoData->completion($id, $done_status);
    }
}
 ?>
