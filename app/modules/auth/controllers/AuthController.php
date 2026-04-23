<?php

namespace App\Modules\Auth\Controllers;

use App\Core\Auth;
use App\Core\Helpers;
use App\Core\Session;
use App\Modules\Auth\Models\User;

class AuthController
{
    public function showLogin(): void
    {
        Auth::requireGuest();
        Helpers::view('auth/views/login');
    }

    public function login(): void
    {
        Session::start();

        $identifier = trim($_POST['identifier'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($identifier === '' || $password === '') {
            $_SESSION['error'] = 'Please complete all fields.';
            Helpers::redirect('/login');
        }

        $user = User::findByEmailOrEmployeeCode($identifier);

        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['error'] = 'Invalid credentials.';
            Helpers::redirect('/login');
        }

        Auth::login($user);
        Auth::redirectByRole();
    }

    public function logout(): void
    {
        Session::start();
        Auth::logout();
        Helpers::redirect('/login');
    }
}