<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Teacher::create([
            'name'=>'Ammar Saleh',
            'email'=>'ammar@saleh.com',
            'phone'=>'0957395871',
            'specialization'=>'math',
            'classroom_id'=> 1,
        ]);
        Teacher::create([
            'name'=>'Ola ahmad',
            'email'=>'ola@ahmad.com',
            'phone'=>'0957495331',
            'specialization'=>'english',
            'classroom_id'=> 2,
        ]);
        Teacher::create([
            'name'=>'Noor Saleh',
            'email'=>'noor@saleh.com',
            'phone'=>'0957885331',
            'specialization'=>'history',
            'classroom_id'=> 3,
        ]);
    }
}
