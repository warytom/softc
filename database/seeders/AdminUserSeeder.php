<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin_1';
        $user->email = 'admin_1@admin.com';
        $user->password = '$2y$10$lzT92L.4CXNve98bBwFdB.oSfUTJJE2tFJI4qVkW6YZiM8gfu2r4m';
        $user->save();

        $user = new User();
        $user->name = 'Admin_2';
        $user->email = 'admin_2@admin.com';
        $user->password = '$2y$10$lzT92L.4CXNve98bBwFdB.oSfUTJJE2tFJI4qVkW6YZiM8gfu2r4m';
        $user->save();
    }
}
