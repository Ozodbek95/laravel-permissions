<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superUser = User::create([
            'name' => 'SuperUser',
            'email' => 'superuser@gmail.com',
            'password' => Hash::make('123')
        ]);

        Role::create([
            'name' => 'super-user'
        ]);

        $superUser->assignRole('super-user');
    }
}
