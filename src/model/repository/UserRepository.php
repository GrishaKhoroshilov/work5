<?php

namespace src\model\repository;

use src\utils\App;

class UserRepository
{
    private $currentUser;

    public function getUserByLoginAndPassword($login, $password)
    {
        if ($this->currentUser) {
            return $this->currentUser;
        }

        $user = App::app()->db->select('SELECT * FROM users WHERE login = :login AND password = :password', [
            ':login' => $login,
            ':password' => $password
        ]);

        if (empty($user)) {
            return null;
        }

        $this->currentUser = $user[0];
        return $user[0];
    }

    public function getUserByUserName($login)
    {
        $user = App::app()->db->select('SELECT * FROM users WHERE login = :login', [
            ':login' => $login
        ]);
        if (empty($user)) {
            return null;
        }
        return $user[0];

    }

    public function saveInDb($registrationData)
    {
        App::app()->db->insert('users', $registrationData);
    }

    public function getUserById($id)
    {
        $user = App::app()->db->select('SELECT * FROM users WHERE id = :id', [
            ':id' => $id
        ]);
        if (empty($user)) {
            return null;
        }
        return $user[0];
    }

    public function getUserByIdAndPassword($id, $password)
    {
        $user = App::app()->db->select('SELECT * FROM users WHERE id = :id AND password = :password', [
            ':id' => $id,
            ':password' => $password
        ]);
        if (empty($user)) {
            return null;
        }
        return $user[0];
    }

    public function updateUser($id, $data)
    {
        App::app()->db->update('UPDATE users SET fio = :fio, password = :password WHERE id = :id', [
            ':fio' => $data['fio'],
            ':password' => $data['password'],
            ':id' => $id,
        ]);
    }
}
