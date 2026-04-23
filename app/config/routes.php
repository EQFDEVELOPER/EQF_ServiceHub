<?php

use App\Modules\Auth\Controllers\AuthController;
use App\Modules\Admin\Controllers\DashboardController as AdminDashboardController;

return [
    ['GET', '/', [AuthController::class, 'showLogin']],
    ['GET', '/login', [AuthController::class, 'showLogin']],
    ['POST', '/login', [AuthController::class, 'login']],
    ['GET', '/logout', [AuthController::class, 'logout']],

    ['GET', '/admin/dashboard', [AdminDashboardController::class, 'index']],
];