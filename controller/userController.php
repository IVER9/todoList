<?php
require('../../model/user.php');
require('../../model/todo.php');

class UserController {

    public function join() {
        try {
            $db = new User();
            $db->setName($_SESSION['join']['name']);
            $db->setPassword($_SESSION['join']['password']);
            $user = $db->checkUser();
            if ($user) {
                $_SESSION['error']['join'] = '登録済みです';
                header('Location: ../join/index.php');
                exit();
            }
            $db->registration();
        } catch (\Exception $e) {
            $_SESSION['error'] = '接続エラー';
        }
    }
    public function list() {
        try {
            $db = new User();
            return $db->all();
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}

 ?>
