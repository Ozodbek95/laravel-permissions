<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CreatePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create post']);
        Permission::create(['name' => 'show post']);
        Permission::create(['name' => 'edit post']);
        Permission::create(['name' => 'delete post']);
    }
}
