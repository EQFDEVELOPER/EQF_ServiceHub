<?php

namespace App\Core;

class Helpers
{
    public static function config(string $file): array
    {
        return require __DIR__ . '/../config/' . $file . '.php';
    }

    public static function baseUrl(string $path = ''): string
    {
        $config = self::config('app');
        return rtrim($config['baseUrl'], '/') . '/' . ltrim($path, '/');
    }

    public static function redirect(string $path): void
    {
        header('Location: ' . self::baseUrl($path));
        exit;
    }

    public static function view(string $path, array $data = []): void
    {
        extract($data);
        require __DIR__ . '/../modules/' . $path . '.php';
    }
}