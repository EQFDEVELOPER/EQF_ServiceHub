<?php
use App\Core\Helpers;
use App\Core\Session;

Session::start();
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EQF ServiceHub</title>
    <link rel="stylesheet" href="<?= Helpers::baseUrl('build/css/app.css'); ?>">
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-slate-800">EQF ServiceHub</h1>
            <p class="text-slate-500 mt-2">Sign in to continue</p>
        </div>

        <?php if ($error): ?>
            <div class="mb-4 rounded-lg bg-red-100 text-red-700 px-4 py-3 text-sm">
                <?= htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form action="<?= Helpers::baseUrl('login'); ?>" method="POST" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Email or Employee Code</label>
                <input
                    type="text"
                    name="identifier"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your email or employee code"
                    required
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                <input
                    type="password"
                    name="password"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your password"
                    required
                >
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-slate-600">
                    <input type="checkbox" name="remember">
                    <span>Stay signed in</span>
                </label>

                <a href="#" class="text-blue-600 hover:underline">Forgot password?</a>
            </div>

            <button
                type="submit"
                class="w-full rounded-xl bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 transition"
            >
                Sign In
            </button>
        </form>
    </div>
</body>
</html>