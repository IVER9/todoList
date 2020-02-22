<?php
require('../../controller/userController.php');

$controller = new UserController();
$users = $controller->list();
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
            <?php  foreach ($users as $user) : ?>
                <tr>
                    <td>
                        <?php echo $user['id'] . PHP_EOL;?>
                    </td>
                    <td>
                        <?php echo $user["name"] . PHP_EOL;?>
                    </td>
                    <td>
                        <?php echo $user["created_at"] . PHP_EOL;?>
                    </td>
                    <td>
                        <?php echo $user['deleted_at'] . PHP_EOL;?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table><br>
        <a class='button' href="index.php">戻る</a>
    </body>
</html>
