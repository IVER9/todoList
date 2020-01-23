<?php
require('../controller/todoController.php');

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
    }
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
                        <form class="status" action="input.php" method="post">
                            <?php if ($todo['status'] === '0'):?>
                                <button class="status" type="summit" name="status" value=<?php echo $todo['id'] ?>>作業中</button>
                            <?php elseif ($todo['status'] === '1'):?>
                                <button class="status" type="summit" name="status"  value=<?php echo $todo['id'] ?>>完　了</button>
                            <?php endif ?>
                        <form>
                    </td>
                    <td>
                        <?php echo $todo['created_at'] . PHP_EOL;?>
                    </td>
                    <td>
                        <form class="delete" action="input.php" method="post">
                            <button class="delete" type="submit" name="id" value=<?php echo $todo['id'] ?>>削除</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </table><br>
        <a class="button" href="new.php">新規作成</a>
    </body>
</html>
