<?php

use App\Models\Movement;
use Illuminate\Database\Seeder;

class MovementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movement::create(['name' => 'Deadlift']);
        Movement::create(['name' => 'Back Squat']);
        Movement::create(['name' => 'Bench Press']);
    }
}
