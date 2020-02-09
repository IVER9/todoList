<?php
require('../model/todo.php');

class LoginController {

    public function newLogin() {
        $name = $_POST['name'];
        $password = $_POST['password'];
        try {
            $db = new Todo();
            $db->setName($name);
            $db->setPassword($password);
            $db->registration();
        } catch (\Exception $e) {
            echo 'ログインできませんでした';
        }
        $_SESSION['name'] = $db->getName();
        $_SESSION['password'] = $db->getPassword();
        header('Location: index.php');
    }
    public function login() {
        $name = $_POST['name'];
        $password = $_POST['password'];
        try {
            $db = new Todo();
            $db->setName($name);
            $db->setPassword($password);
            return $db->checkUser();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
 ?>
