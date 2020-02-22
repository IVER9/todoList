<?php
require('../../controller/userController.php');
session_start();

$name = $_SESSION['join']['name'];
$password = $_SESSION['join']['password'];

if (!isset($_SESSION['join'])) {
    header('Location: index.php');
    exit();
}
if (!empty($_POST)) {
    $controller = new UserController();
    $controller->join();
    if (!empty($_SESSION['error'])) {
        header('Location: ../join/index.php');
    }else {
        unset($_SESSION);
        header('Location: ../login/login.php');
        exit();
    }
}

 ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>確認画面</title>
        <link rel="stylesheet" href="../../css/styles.css">
    </head>
    <body>
        <h1>登録情報</h1>
        <form class="" action="" method="post">
            <input type="hidden" name="action" value="submit">
            <input type="hidden" name="name" value="<?php echo $name ?>">
            <input type="hidden" name="password" value="<?php echo $password ?>">
        <dl class="">
            <dt>【名前】</dt>
            <dd><?php echo $name ?></dd>
            <dt>【パスワード】</dt>
            <dd>【表示しません】</dd>
        </dl>
            <a class='button' href="index.php"><<変更</a>
            <input class='button' type="submit" name="" value="登録する">
        </form>
    </body>
</html>
