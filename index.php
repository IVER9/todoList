<?php

require('./controller/todoController.php');

$todoDate = new TodoController();
$todos = $todoDate->index();
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>todoList</title>
    </head>
    <body>
        <h1>todoTable data</h1>
        <table>
            <?php  foreach ($todos as $todo) : ?>
                <tr>
                    <?php  foreach ($todo as $column => $value) : ?>
                        <?php if ($column === "id"):?><tr><?php echo "$column: $value" . PHP_EOL;?><br></tr><?php endif ?>
                        <?php if ($column === "title"):?><tr><?php echo "$column: $value" . PHP_EOL;?><br></tr><?php endif ?>
                        <?php if ($column === "status"):?><tr><?php echo "$column: $value" . PHP_EOL;?><br></tr><?php endif ?>
                        <?php if ($column === "created_at"):?><tr><?php echo "$column: $value" . PHP_EOL;?><br></tr><?php endif ?>
                    <?php endforeach ?>
                </tr>
                <button type="summit" name="button">削除</button><br><br>
            <?php endforeach ?>
        </table>
    </body>
</html>
