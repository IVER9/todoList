<?php
require('../controller/todoController.php');

if (isset($_GET['action'])) {
    $todoData = new TodoController();
    if ($_GET['action'] === 'delete') {
        $result = $todoData->delete();
        if (!$result) {
            echo '削除に失敗しました。';
        }
    }
    if ($_GET['action'] === 'edit') {
            $result = $todoData->done();
            if (!$result) {
                echo '更新に失敗しました。';
            }
    }
}
// header('Location: index.php');
$todoDate = new TodoController();
$todos = $todoDate->index();
?>
