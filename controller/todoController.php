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
        $todoData->setTitle($title);
        $todoData->setDetail($detail);
        $todoData->save();
        header('Location: index.php');
    }
    public function delete() {
        $id = $_GET['id'];
        $todoData = new Todo();
        $todoData->setId($id);
        $todoData->deleted();
        header('Location: index.php');
    }
    public function done() {
        $id = $_GET['id'];
        $status = $_GET['status'];
        if ($status === "0") {
            $done_status = "1";
        }
        if ($status === "1") {
            $done_status = "0";
        }
        $todoData = new Todo();
        $todoData->setId($id);
        $todoData->setStatus($done_status);
        $todoData->completion();
        header('Location: index.php');
    }
}
 ?>
