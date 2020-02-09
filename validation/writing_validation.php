<?php

class WritingValidation {
    private $errors;
    private $params;

    public function __construct($params) {
        $this->params = $params;
    }
    public function validation() {
        if ($this->params['title'] === "") {
            $this->errors['title'] = '※タイトルを入力してください';
        }
        if (20 < mb_strlen($this->params['title'])) {
            $this->errors['title'] = '※20文字以内で入力してください';
        }
        if ($this->params['detail'] === "") {
            $this->errors['detail'] = '※内容を入力してください';
        }
        if (80 < mb_strlen($this->params['detail'])) {
            $this->errors['detail'] = '※80文字以内で入力してください';
        }
        if ($this->errors) {
            return $this->errors;
        }
    }
    public function getErrorsMessage() {
        return $this->errors;
    }
    public function getParams() {
        return $this->params;
    }

}

 ?>
