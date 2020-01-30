<?php
require('../model/todo.php');

class TodoController {

    public function index() {
        try {
            $sql = 'SELECT * FROM todo';
            $todoData = new Todo();
            return $todoData -> findByQuery($sql);
        } catch (\Exception $e) {
            $_SESSION['error'] =  "※データの取得に失敗しました";
        }
    }
    public function new() {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            return;
        }
        session_start();
        $errors = array();
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        if ($title === "") {
            $errors['title'] = '※タイトルを入力してください';
        }
        if (20 < mb_strlen($_POST['title'])) {
            $errors['title'] = '※20文字以内で入力してください';
        }
        if ($detail === "") {
            $errors['detail'] = '※内容を入力してください';
        }
        if (80 < mb_strlen($_POST['detail'])) {
            $errors['detail'] = '※80文字以内で入力してください';
        }
        if ($errors) {
            return $errors;
        }
        try {
            $todoData = new Todo();
            $todoData->setTitle($title);
            $todoData->setDetail($detail);
            $todoData->save();
        } catch (\Exception $e) {
            $_SESSION['error'] =  "※新規作成できませんでした";
        }
        header('Location: index.php');
    }
    public function delete() {
        $id = $_GET['id'];
        try {
            $todoData = new Todo();
            $todoData->setId($id);
            $todoData->deleted();
        } catch (\Exception $e) {
            $_SESSION['error'] = "※削除できません";
        }
        header('Location: index.php');
    }
    //statusを完了、作業中にする関数//
    public function done() {
        $id = $_GET['id'];
        $status = $_GET['status'];
        if ($status === "0") {      //statusが作業中の時
            $done_status = "1";     //完了に変更
        }
        if ($status === "1") {      //statusが完了の時
            $done_status = "0";     //作業中に変更
        }
        try {
            $todoData = new Todo();
            $todoData->setId($id);
            $todoData->setStatus($done_status);
            $todoData->completion();
        } catch (\Exception $e) {
            $_SESSION['error'] = "※更新できません";
        }
        header('Location: index.php');
    }
}
 ?>
