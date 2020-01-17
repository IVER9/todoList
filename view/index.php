<?php

require('./controller/todoController.php');

$todoDate = new TodoController();
$todos = $todoDate->index();
$row_count = 1;
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>todoList</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>todoTable data</h1>
        <table border="1" style=border-collapse:collapse;>
            <?php  foreach ($todos as $todo) : ?>
                <?php if ($row_count === 1):?>
                    <tr style=background-color:tomato;>
                    <?php  foreach ($todo as $column => $value) : ?>
                        <?php if ($column === "id"):?><th><?php echo "$column" . PHP_EOL;?></th><?php endif ?>
                        <?php if ($column === "title"):?><th><?php echo "$column" . PHP_EOL;?></th><?php endif ?>
                        <?php if ($column === "status"):?><th><?php echo "$column" . PHP_EOL;?></th><?php endif ?>
                        <?php if ($column === "created_at"):?><th><?php echo "$column" . PHP_EOL;?></th><?php endif ?>
                        <?php $row_count++; ?>
                    <?php endforeach ?><th>-</th>
                <?php endif ?></tr>
                <tr><?php  foreach ($todo as $column => $value) : ?>
                        <?php if ($column === "id"):?><td><?php echo "$value" . PHP_EOL;?></td><?php endif ?>
                        <?php if ($column === "title"):?><td><?php echo "$value" . PHP_EOL;?></td><?php endif ?>
                        <?php if ($column === "status"):?><td><?php if ($value === '0'):?><button  style=background-color:skyblue; type="summit" name="button">作業中</button></td>
                        <?php elseif ($value === '1'):?><button  style=background-color:skyblue; type="summit" name="button">完　了</button><?php endif ?><?php endif ?>
                        <?php if ($column === "created_at"):?><td><?php echo "$value" . PHP_EOL;?></td><?php endif ?>
                    <?php endforeach ?>
                <td><button  style=background-color:skyblue; type="summit" name="button">削除</button></td></tr>
            <?php endforeach ?>
        </table>
    </body>
</html>
