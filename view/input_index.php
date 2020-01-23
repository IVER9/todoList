<?php
require('../controller/todoController.php');

header('Location: index.php');
$todoDate = new TodoController();
$todos = $todoDate->index();
if (isset($_POST["id"])) {
    $todoData = new TodoController();
    $result = $todoData->delete();
    if (!$result) {
        echo '削除に失敗しました。';
    }
}
if (isset($_POST["status"])) {
        $todoData = new TodoController();
        $result = $todoData->done();
        if (!$result) {
            echo '更新に失敗しました。';
        }
        $_POST = null;
    }
?>
