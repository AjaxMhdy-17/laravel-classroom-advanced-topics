<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '11111111',
            'role' => 'teacher'
        ]);
        User::factory()->create([
            'name' => 'mhdy',
            'email' => 'mhdy@gmail.com',
            'password' => '11111111',
            'role' => 'admin'
        ]);
        
        User::factory()->create([
            'name' => 'ajax',
            'email' => 'ajax@gmail.com',
            'password' => '11111111',
            'role' => 'student'
        ]);

        User::factory()->count(10)->create();
    }
}
