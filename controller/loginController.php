<?php
require('../../model/todo.php');

class LoginController {

    public function index() {
        $this->logout();
        if (isset($_POST['login'])) {
            $login = new LoginValidation($_POST['name'], $_POST['password']);
            $login->validation();
            $errors = $login->getErrorsMessage();
            $_SESSION['errors'] = $errors;
            if (!$_SESSION['errors']) {
                $user = $this->login();
                $_SESSION['user'] = $user;
                if ($_SESSION['user']) {
                    $_SESSION['errors'] = null;
                    header('Location: /view/todo/index.php');
                }
                if (!$_SESSION['user']) {
                    $_SESSION['errors']['user'] = '※名前もしくはパスワードがちがいます';
                }
            }
        }
    }
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
    private function login() {
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
    private function logout() {
        if ($_REQUEST['action'] === 'logout') {
            $_SESSION = array();
        }
    }
}
 ?>
