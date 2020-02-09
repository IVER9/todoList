<?php
require('../controller/loginController.php');
require('../validation/login_validation.php');

session_start();

if (isset($_POST['login'])) {
    $login = new LoginValidation($_POST['name'], $_POST['password']);
    $login->validation();
    $errors = $login->getErrorsMessage();
    $_SESSION['errors'] = $errors;
    if (!$_SESSION['errors']) {
        $db = new LoginController();
        $user = $db->login();
        $_SESSION['user'] = $user;
        if ($_SESSION['user']) {
            $_SESSION['errors'] = null;
            header('Location: index.php');
        }
        if (!$_SESSION['user']) {
            $_SESSION['errors']['user'] = '※名前もしくはパスワードがちがいます';
        }
    }
}
 ?>


<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>login</title>
        <link rel="stylesheet" href="./styles.css">
    </head>
    <body>
        <h1>LOGIN</h1><strong class="error"><?php echo $_SESSION['errors']['user'] ?></strong>
        <form class="" action="login.php" method="post">
            <p>name</p>
            <input type="text" name="name" placeholder="名前を入力" value='<?php echo $_SESSION['user'][0]['name'] ?>'>
            <strong class="error"><?php echo $_SESSION['errors']['name'] ?></strong><br>
            <p>password</p>
            <input type="password" name="password" maxlength="8" placeholder="パスワードを入力">
            <strong class="error"><?php echo $_SESSION['errors']['password'] ?></strong><br><br>
            <input name='login' type='submit' value='送信'>
        </form>
    </body>
</html>
