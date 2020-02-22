<?php
require('../../validation/join_validation.php');
session_start();

if (!empty($_POST)) {
    $validation = new JoinValidation();
    $validation->validation();
    $_SESSION['error'] = $validation->getErrorsMessage();
    if (empty($_SESSION['error'])) {
        $_SESSION['join'] = $_POST;
        header('Location: confirm.php');
    }
}

 ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>新規登録</title>
        <link rel="stylesheet" href="../../css/styles.css">
    </head>
    <body>
        <strong class='error'>
            <?php foreach ($_SESSION['error'] as $error) : ?>
                <?php echo $error ?><br>
            <?php endforeach ?>
        </strong>
        <h1>新規登録</h1>
        <form class="" action="" method="post">
            <p>name</p>
            <input type="text" name="name" value="" placeholder="名前" >
            <p>password</p>
            <input type="password" name="password" value="" placeholder="パスワード" ><br><br>
            <input class='button' type="submit" name="" value="確認する">
            <a  class='button' href="../login/login.php">戻る</a>
        </form>
    </body>
</html>
