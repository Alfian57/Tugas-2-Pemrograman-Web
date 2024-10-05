<?php

namespace App\Controllers;

use Repositories\UserRepository;

class AuthController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function login(): void
    {
        require_once __DIR__ . '/../../Views/login.php';
    }

    public function authenticate(): void
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $_SESSION['flash_message'] = 'Email and password are required';
            header('Location: /');
            return;
        }

        $user = $this->repository->getUserByEmail($email);

        if (!$user || $user['password'] !== $password) {
            $_SESSION['flash_message'] = 'Email or password is incorrect';
            header('Location: /');
            return;
        }

        $_SESSION['user'] = $user;
        header('Location: /guest-books');
    }
}
