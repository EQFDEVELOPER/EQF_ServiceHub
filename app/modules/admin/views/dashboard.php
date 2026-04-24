<?php ob_start(); ?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-sm text-slate-500">Users</h2>
        <p class="text-2xl font-bold mt-2">12</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-sm text-slate-500">Tickets</h2>
        <p class="text-2xl font-bold mt-2">45</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-sm text-slate-500">Areas</h2>
        <p class="text-2xl font-bold mt-2">6</p>
    </div>

</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../../../views/layouts/main.php';
?>