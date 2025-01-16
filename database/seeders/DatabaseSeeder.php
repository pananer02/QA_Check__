<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // สร้าง Roles
        $roles = ['Admin', 'QA', 'OH', 'User'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // สร้างผู้ใช้ตัวอย่าง
        User::create([
            'name' => 'Bek',
            'email' => 'bek@sungroup.co.th',
            'password' => bcrypt('12312344'),
            'role_id' => Role::where('name', 'Admin')->first()->id,
        ]);
    }
}
