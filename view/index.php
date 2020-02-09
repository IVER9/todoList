<?php
require('../controller/todoController.php');

session_start();
if (isset($_GET['action'])) {
    $todoData = new TodoController();
    if ($_GET['action'] === 'delete') {
        $todoData->delete();
    }
    if ($_GET['action'] === 'edit') {
            $todoData->done();
    }
}

$todoData = new TodoController();
$todos = $todoData->index();
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>todoList</title>
        <link rel="stylesheet" href="./styles.css">
    </head>
    <body>
        <h1>todoList</h1>
        <?php if($_SESSION) : ?>
            <strong class='error'><?php print_r($_SESSION['index_error']); ?></strong>
        <?php endif ?>
        <table>
            <tr class="index">
                <th>id</th>
                <th>title</th>
                <th>status</th>
                <th>created_at</th>
                <th>-</th>
            </tr>
            <?php  foreach ($todos as $todo) : ?>
                <tr>
                    <td>
                        <?php echo $todo['id'] . PHP_EOL;?>
                    </td>
                    <td>
                        <?php echo $todo["title"] . PHP_EOL;?>
                    </td>
                    <td>
                        <?php if ($todo['status'] === '0'):?>
                            <a href="index.php?action=edit&id=<?php echo $todo['id'] ?>&status=<?php echo $todo['status'] ?>">作業中</a>
                        <?php elseif ($todo['status'] === '1'):?>
                            <a href="index.php?action=edit&id=<?php echo $todo['id'] ?>&status=<?php echo $todo['status'] ?>">完　了</a>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php echo $todo['created_at'] . PHP_EOL;?>
                    </td>
                    <td>
                        <a href="index.php?action=delete&id=<?php echo $todo['id'] ?>">削除</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table><br>
        <a class="button" href="new.php">新規作成</a><a class="button" href="login.php">ログアウト</a>
    </body>
</html>
