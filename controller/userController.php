<?php
require('../../model/user.php');
require('../../model/todo.php');

class UserController {

    public function join() {
        try {
            $check = User::checkUser($_POST['name'], $_POST['password']);
            if ($check) {
                $_SESSION['error']['join'] = '登録済みです';
                header('Location: ../join/index.php');
                exit();
            }
            $user = new User();
            $user->setName($_POST['name']);
            $user->setPassword($_POST['password']);
            $user->registration();
        } catch (\Exception $e) {
            $_SESSION['error'] = '接続エラー';
        }
    }
    public function list() {
        try {
            $db = new User();
            return $db->getAll();
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}

 ?>
