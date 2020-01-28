<?php
require('../controller/todoController.php');

$errors = array();

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $detail = $_POST["detail"];

    if ($title === "") {
        $errors['title'] = '※タイトルを入力してください';
    }
    if ($detail === "") {
        $errors['detail'] = '※内容を入力してください';
    }
    if (!$errors) {
        $todoData = new TodoController();
        $todoData->new();
    }
}
 ?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>TODO新規作成</title>
        <link rel="stylesheet" href="./styles.css">
    </head>
    <body>
        <h1>TODO新規作成</h1>
        <form  action="" method="post">
            <p>title</p>
            <input type="text" name="title" placeholder="タイトル">
            <strong class='error'><?php echo $errors['title']; ?></strong><br>
            <p>detail</p>
            <textarea name="detail" rows="8" cols="80" placeholder="内容をご自由にお書きください"></textarea>
            <strong class='error'><?php echo $errors['detail']; ?></strong><br><br>
            <input class=button type="submit" name="submit" value="保存">
            <a class=button href="index.php">戻る</a>
        </form><br>
        <strong class='error'><?php echo $errors['save'];?></strong>
    </body>
</html>
