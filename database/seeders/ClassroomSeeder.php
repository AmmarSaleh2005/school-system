<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Classroom::create([
            'name'=> 'A',
            'description'=>'no desc',
            'capacity'=>30
        ]);
        Classroom::create([
            'name'=> 'B',
            'description'=>'no desc',
            'capacity'=>35
        ]);
        Classroom::create([
            'name'=> 'C',
            'description'=>'no desc',
            'capacity'=>20
        ]);
    }
}
