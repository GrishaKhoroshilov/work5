<?php

namespace src\utils;

class User
{
    public function login($user)
    {
        $_SESSION['user_id'] = $user['id'];
    }

    public function isAuth()
    {
        return isset($_SESSION['user_id']) && $_SESSION['user_id'];
    }

    public function logout()
    {
        $_SESSION['user_id'] = null;
    }

    public function getUserId()
    {
        return $_SESSION['user_id'];
    }

}