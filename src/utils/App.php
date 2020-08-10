<?php


namespace src\utils;


use src\model\repository\UserRepository;

class App
{
    public $view;
    public $db;
    public $user;
    public $userRepository;

    private static $instance;


    public static function app()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->db = new Db();
        $this->view = new Renderer();
        $this->user = new User();
        $this->userRepository = new UserRepository();
    }

}