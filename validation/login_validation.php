<?php
require('basic_validation.php');

class LoginValidation extends BasicValidation {
    private $name;
    private $password;

    public function __construct($name, $password) {
        $this->name = $name;
        $this->password = $password;
    }
    public function validation() {
        if ($this->name['name'] === "") {
            $this->errors['name'] = '※名前を入力してください';
        }
        if ($this->password['password'] === "") {
            $this->errors['password'] =  '※パスワードを入力してください';
        }
    }
}
 ?>
