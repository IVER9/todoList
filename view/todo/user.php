<?php
require('../../controller/userController.php');

$controller = new UserController();
$list = $controller->list();

 ?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>userTable</title>
        <link rel="stylesheet" href="../../css/styles.css">
    </head>
    <body>
        <h1>USERTABLE</h1>
        <table>
            <tr class="index">
                <th>id</th>
                <th>name</th>
                <th>created_at</th>
                <th>deleted_at</th>
            </tr>
            <?php  foreach ($list as $users) : ?>
                <tr>
                    <td>
                        <?php echo $users['id'] . PHP_EOL;?>
                    </td>
                    <td>
                        <?php echo $users["name"] . PHP_EOL;?>
                    </td>
                    <td>
                        <?php echo $users["created_at"] . PHP_EOL;?>
                    </td>
                    <td>
                        <?php echo $todo['deleted_at'] . PHP_EOL;?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table><br>
        <a class='button' href="index.php">戻る</a>
    </body>
</html>
