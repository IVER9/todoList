<?php
require('../model/todo.php');
require('../validation/writing_validation.php');

class TodoController {

    public function index() {
        try {
            $sql = 'SELECT * FROM todo';
            $todoData = new Todo();
            return $todoData -> findByQuery($sql);
        } catch (\Exception $e) {
            $_SESSION['index_error'] =  "※データの取得に失敗しました";
        }
    }
    public function new() {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            return;
        }
        $errors = array();
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        $params = array('title'=>$title, 'detail'=>$detail);
        $validation = new WritingValidation($params);
        $result = $validation->validation();            //入力値のバリデーションチェック
        if ($result) {                                  //エラーがあるなら場合
            $msgs = $validation->getErrorsMessage();
            $_SESSION['errors'] = $msgs;
            return;
        }
        $checked_params = $validation->getParams();     //バリデーションチェックされた値をかえす
        try {
            $todoData = new Todo();
            $todoData->setTitle($checked_params['title']);      //チェックされた値をセット
            $todoData->setDetail($checked_params['detail']);
            $todoData->save();
        } catch (\Exception $e) {
            session_start();
            $_SESSION['index_error'] =  "※新規作成できませんでした";
        }
        header('Location: index.php');
    }
    public function delete() {
        $id = $_GET['id'];
        try {
            $todoData = new Todo();
            $check_id = $todoData->checkId($id);        //リクエストされたIDが存在するかチェック
            if (!$check_id) {
                $_SESSION['index.error'] = 'データはありません';
                header('Location: index.php');
            }
            $todoData->setId($check_id);
            $todoData->delete();
        } catch (\Exception $e) {
            $_SESSION['index_error'] = "※削除できませんでした";
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
            $check_id = $todoData->checkId($id);        //リクエストされたIDが存在するかチェック
            if (!$check_id) {
                $_SESSION['index.error'] = 'データはありません';
                header('Location: index.php');
            }
            $todoData->setId($check_id);
            $todoData->setStatus($done_status);
            $todoData->completion();
        } catch (\Exception $e) {
            $_SESSION['index_error'] = "※更新できません";
        }
        header('Location: index.php');
    }

}
 ?>
