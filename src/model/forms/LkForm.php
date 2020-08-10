<?php


namespace src\model\forms;

use src\utils\App;

class LkForm
{
    public $errorList = [];
    public $formData;

    public function fillForm($data)
    {
        $this->formData = $data;
    }

    public function validate()
    {
        $this->checkFio();
        $this->checkNewPassword();
        $this->checkOldPassword();

        return empty($this->errorList);
    }

    private function checkNewPassword()
    {
        if (empty($this->formData['new_password'])) {
            $this->errorList['new_password'] = 'Поле должно быть заполнено';
            return;
        }
        if (strlen($this->formData['new_password']) < 3 || strlen($this->formData['new_password']) > 50) {
            $this->errorList['new_password'] = 'Пароль должен быть не менее  3-х символов и не более 50 символов';
            return;
        }
    }

    private function checkOldPassword()
    {
        $userId = App::app()->user->getUserId();
        $oldPassword = md5($this->formData['old_password']);

        if (!App::app()->userRepository->getUserByIdAndPassword($userId, $oldPassword)) {
            $this->errorList['old_password'] = 'Введите коректный пароль';
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