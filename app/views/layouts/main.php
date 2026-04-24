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
    <title>Dashboard | ServiceHub</title>
    <link rel="stylesheet" href="<?= Helpers::baseUrl('build/css/app.css'); ?>">
</head>

<body class="bg-slate-100">

    <div class="flex min-h-screen">

        <?php require __DIR__ . '/sidebar.php'; ?>

        <div class="flex-1 flex flex-col">

            <?php require __DIR__ . '/header.php'; ?>

            <main class="p-6">
                <?= $content ?? '' ?>
            </main>

        </div>

    </div>

</body>
</html>