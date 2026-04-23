<?php

use App\Core\Auth;
use App\Core\Helpers;

$user = Auth::user();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= Helpers::baseUrl('build/css/app.css'); ?>">
</head>
<body class="bg-slate-100 min-h-screen">
    <div class="p-6">
        <div class="bg-white rounded-2xl shadow p-6">
            <h1 class="text-2xl font-bold text-slate-800">Admin Dashboard</h1>
            <p class="text-slate-600 mt-2">
                Welcome, <?= htmlspecialchars($user['firstName'] . ' ' . $user['lastName']); ?>
            </p>

            <a href="<?= Helpers::baseUrl('logout'); ?>" class="inline-block mt-4 text-red-600 hover:underline">
                Logout
            </a>
        </div>
    </div>
</body>
</html>