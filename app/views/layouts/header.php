<?php
use App\Core\Auth;

$user = Auth::user();
?>

<header class="bg-white shadow px-6 py-4 flex justify-between items-center">

    <h1 class="text-lg font-bold text-slate-800">
        Admin Dashboard
    </h1>

    <div class="text-sm text-slate-600">
        <?= htmlspecialchars($user['firstName']); ?>
    </div>

</header>