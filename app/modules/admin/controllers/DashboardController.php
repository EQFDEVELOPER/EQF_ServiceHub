<?php

namespace App\Modules\Admin\Controllers;

use App\Core\Auth;

class DashboardController
{
    public function index(): void
    {
        Auth::requireRole('admin');
        require __DIR__ . '/../views/dashboard.php';
    }
}