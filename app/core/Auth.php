<?php

namespace App\Core;

class Auth
{
    public static function check(): bool
    {
        return Session::has('user');
    }

    public static function user(): ?array
    {
        return Session::get('user');
    }

    public static function login(array $user): void
    {
        Session::set('user', [
            'id' => $user['id'],
            'firstName' => $user['first_name'],
            'lastName' => $user['last_name'],
            'email' => $user['email'],
            'roleCode' => $user['role_code'],
            'areaCode' => $user['area_code'],
        ]);
    }

    public static function logout(): void
    {
        Session::destroy();
    }

    public static function requireGuest(): void
    {
        if (self::check()) {
            self::redirectByRole();
        }
    }

    public static function requireAuth(): void
    {
        if (!self::check()) {
            Helpers::redirect('/login');
        }
    }

    public static function requireRole(string $roleCode): void
    {
        self::requireAuth();

        $user = self::user();
        if (($user['roleCode'] ?? null) !== $roleCode) {
            Helpers::redirect('/login');
        }
    }

    public static function redirectByRole(): void
    {
        $user = self::user();
        $roleCode = $user['roleCode'] ?? null;

        match ($roleCode) {
            'admin' => Helpers::redirect('/admin/dashboard'),
            'manager' => Helpers::redirect('/manager/dashboard'),
            'coordinator' => Helpers::redirect('/coordinator/dashboard'),
            'analyst' => Helpers::redirect('/analyst/dashboard'),
            'user' => Helpers::redirect('/user/dashboard'),
            default => Helpers::redirect('/login'),
        };
    }
}