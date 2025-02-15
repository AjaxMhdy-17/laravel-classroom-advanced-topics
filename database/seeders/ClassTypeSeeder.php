<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassType::create([
            'name' => "class-type-1",
            'description' => fake()->text(),
            'minutes' => 60,
        ]);

        ClassType::create([
            'name' => "class-type-2",
            'description' => fake()->text(),
            'minutes' => 90,
        ]);

        ClassType::create([
            'name' => "class-type-3",
            'description' => fake()->text(),
            'minutes' => 45,
        ]);

        ClassType::create([
            'name' => "class-type-4",
            'description' => fake()->text(),
            'minutes' => 30,
        ]);
    }
}
