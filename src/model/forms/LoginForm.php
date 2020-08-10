<?php

namespace src\model\forms;

use src\model\repository\UserRepository;
use src\utils\App;

class LoginForm
{
    public $errorList = [];
    public $user;

    public $formData;

    public function fillForm($data)
    {
        $this->formData = $data;
    }

    public function validate()
    {
        $this->checkRequired();

        if (empty($this->errorList)) {
            $this->checkMinimalLogin();
            $this->checkMaximalLogin();
        }

        if (empty($this->errorList)) {
            $this->checkUser($this->formData['login'], md5($this->formData['password']));
        }

        return empty($this->errorList);
    }

    private function checkUser($login,$password)
    {
        $user = App::app()->userRepository->getUserByLoginAndPassword($login, $password);

        if (empty($user)) {
            $this->errorList['login'] = "Не верное имя пользователя или пароль";
        } else {
            $this->user = $user;
        }
    }

    private function checkRequired()
    {
        if (empty($this->formData['login'])) {
            $this->errorList['login'] = 'Введите логин';
        }
        if (empty($this->formData['password'])) {
            $this->errorList['password'] =  'Введите пароль';
        }
    }

    private function checkMinimalLogin()
    {
        if (strlen($this->formData['login']) < 3) {
            $this->errorList['login'] = 'Логин должен быть больше 3-х символов';
        }
    }

    private function checkMaximalLogin()
    {
        if (strlen($this->formData['login']) > 30) {
            $this->errorList['login'] = 'Логин должен быть не более 30 символов';
        }
    }




}