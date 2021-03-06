<?php
require('../../controller/loginController.php');
require('../../validation/login_validation.php');

session_start();
session_destroy();
$controller = new LoginController();
$controller->index();
 ?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>login</title>
        <link rel="stylesheet" href="../../css/styles.css">
    </head>
    <body>
        <h1>LOGIN</h1><strong class="error"><?php echo $_SESSION['errors']['user'] ?></strong>
        <form class="" action="" method="post">
            <p>name</p>
            <input type="text" name="name" placeholder="名前を入力" value='<?php echo $_SESSION['user'][0]['name'] ?>'>
            <strong class="error"><?php echo $_SESSION['errors']['name'] ?></strong><br>
            <p>password</p>
            <input type="password" name="password" maxlength="8" placeholder="パスワードを入力">
            <strong class="error"><?php echo $_SESSION['errors']['password'] ?></strong><br><br>
            <input class='button' name='login' type='submit' value='ログイン'>
            <a class='button' href="../join/index.php">新規登録</a>
        </form>
    </body>
</html>
