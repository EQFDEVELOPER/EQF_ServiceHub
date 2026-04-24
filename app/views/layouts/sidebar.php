<?php
use App\Core\Helpers;
?>

<aside class="w-64 bg-[#14378A] text-white flex flex-col">

    <div class="p-6 text-xl font-bold">
        ServiceHub
    </div>

    <nav class="flex-1 px-4 space-y-2">

        <a href="<?= Helpers::baseUrl('admin/dashboard'); ?>" 
           class="block px-4 py-3 rounded-lg hover:bg-white/10">
            Dashboard
        </a>

        <a href="<?= Helpers::baseUrl('admin/users'); ?>" 
           class="block px-4 py-3 rounded-lg hover:bg-white/10">
            Users
        </a>

        <a href="#" class="block px-4 py-3 rounded-lg hover:bg-white/10">
            Areas
        </a>

        <a href="#" class="block px-4 py-3 rounded-lg hover:bg-white/10">
            Roles
        </a>

    </nav>

    <div class="p-4">
        <a href="<?= Helpers::baseUrl('logout'); ?>" 
           class="block text-center bg-red-500 hover:bg-red-600 py-2 rounded-lg">
            Logout
        </a>
    </div>

</aside>