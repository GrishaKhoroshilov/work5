<?php


namespace src\model\forms;


use src\utils\App;

class RegistrationForm
{
    public $errorList = [];
    public $formData;

    public function fillForm($data)
    {
        $this->formData = $data;
    }

    public function validate()
    {
        $this->checkLogin();
        $this->checkPassword();
        $this->checkEmail();
        $this->checkFio();

        return empty($this->errorList);
    }

    private function checkLogin()
    {
        if (empty($this->formData['login'])) {
            $this->errorList['login'] = 'Поле должно быть заполнено';
            return;
        }

        if (strlen($this->formData['login']) < 3 || strlen($this->formData['login']) > 30) {
            $this->errorList['login'] = 'Логин должен быть не менее  3-х символов и не более 30 символов';
            return;
        }
        if (App::app()->userRepository->getUserByUserName($this->formData['login']) != null) {
            $this->errorList['login'] = 'Логин уже занят';
            return;
        }
    }

    private function checkPassword()
    {
        if (empty($this->formData['password'])) {
            $this->errorList['password'] = 'Поле должно быть заполнено';
            return;
        }
        if (strlen($this->formData['password']) < 3 || strlen($this->formData['password']) > 50) {
            $this->errorList['password'] = 'Пароль должен быть не менее  3-х символов и не более 50 символов';
            return;
        }
        if ($this->formData['password'] != $this->formData['repassword']) {
            $this->errorList['password'] = 'Пароли должены совподать';
            $this->errorList['repassword'] = 'Пароли должены совподать';
            return;
        }
    }

    private function checkEmail()
    {
        if (empty($this->formData['email'])) {
            $this->errorList['email'] = 'Поле должно быть заполнено';
            return;
        }
        // Т.к в задаче не сказано о проверки почты то делаем простую поверку на @
        if (stripos($this->formData['email'], '@') === false) {
            $this->errorList['email'] = 'Введите корректный email';
            return;
        }
    }

    private function checkFio()
    {
        if (empty($this->formData['fio'])) {
            $this->errorList['password'] = 'Поле должно быть заполнено';
            return;
        }
    }
}