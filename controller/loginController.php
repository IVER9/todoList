<?php
require('../../model/todo.php');
require('../../model/user.php');

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
    private function login() {
        return User::checkUser($_POST['name'], $_POST['password']);
    }
    private function logout() {
        if ($_REQUEST['action'] === 'logout') {
            $_SESSION = array();
        }
    }
}
 ?>
