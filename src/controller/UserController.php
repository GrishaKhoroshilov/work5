<?php

namespace src\controller;

use mysql_xdevapi\Exception;
use src\model\forms\LkForm;
use src\model\forms\LoginForm;
use src\model\forms\RegistrationForm;
use src\utils\App;

class UserController
{
    public function login()
    {
        if (App::app()->user->isAuth()) {
            header('Location: http://work5/lk.php');
            return;
        }

        $loginForm = new LoginForm();
        if (!empty($_POST)) {
            $loginForm->fillForm($_POST);

            if ($loginForm->validate()) {
                App::app()->user->login($loginForm->user);
                header('Location: http://work5/lk.php');
                return;
            }
        }

        $view = App::app()->view->render('login', [
            'loginForm' => $loginForm
        ]);
        echo $view;
    }

    public function register()
    {
        if (App::app()->user->isAuth()) {
            header('Location: http://work5/lk.php');
            return;
        }
        $regForm = new RegistrationForm();
        if (!empty($_POST)) {
            $regForm->fillForm($_POST);

            if ($regForm->validate()) {
                $registrationData = [
                    'login' => $regForm->formData['login'],
                    'password' => md5($regForm->formData['password']),
                    'email' => $regForm->formData['email'],
                    'fio' => $regForm->formData['fio'],
                ];
                App::app()->userRepository->saveInDb($registrationData);
                header('Location: http://work5/index.php');

                return;
            }
        }
        // отрисовка Регистрации
        $view = App::app()->view->render('register', [
            'regForm' => $regForm
        ]);
        echo $view;
    }

    public function lk()
    {
        if (!App::app()->user->isAuth()) {
            header('Location: http://work5/index.php');
            return;
        }
        $id = App::app()->user->getUserId();
        $user = App::app()->userRepository->getUserById($id);


        $lkForm = new LkForm();
        $lkForm->fillForm([
            'fio' => $user['fio']
        ]);

        if (!empty($_POST)) {
            $lkForm->fillForm($_POST);

            if ($lkForm->validate()) {
                App::app()->userRepository->updateUser($id, [
                    'fio' => $lkForm->formData['fio'],
                    'password' => md5($lkForm->formData['new_password'])
                ]);
                header('Location: http://work5/lk.php');
                return;
            }

        }
    // отрисовка ЛК
        $view = App::app()->view->render('lk', [
            'lkForm' => $lkForm,
            'username' => $user['login']
        ]);

        echo $view;
    }

}