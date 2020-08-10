<?php
include 'Db.php';
include 'Renderer.php';
include 'App.php';
include 'User.php';
include __DIR__ . "/../model/repository/UserRepository.php";
include __DIR__ . "/../model/forms/LoginForm.php";
include __DIR__ . "/../model/forms/LkForm.php";
include __DIR__ . "/../model/forms/RegistrationForm.php";
include __DIR__ . '/../controller/UserController.php';
session_start();