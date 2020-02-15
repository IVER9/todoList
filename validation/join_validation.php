<?php
require('basic_validation.php');

class JoinValidation extends BasicValidation {


    public function validation() {
            if ($_POST['name'] === "") {
                $this->errors['name'] = '名前を入力してください';
            }
            if (strlen($_POST['password']) < 4) {
                $this->errors['password'] = '四文字以上入力してください';
            }
            if ($_POST['password'] === "") {
                $this->errors['password'] = 'パスワードを入力してください';
            }
    }
}
 ?>
