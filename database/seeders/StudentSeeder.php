<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $students = [
            [
                'name' => 'Reem aziz',
                'email' => 'reem@aziz.com',
                'phone' => '0957495331',
                'birth_date' => '2006-7-18',
                'classroom_id' => 1,
            ],
            [
                'name' => 'Noor ahmad',
                'email' => 'noor@ahmad.com',
                'phone' => '0957495331',
                'birth_date' => null,
                'classroom_id' => 1,
            ],
            [
                'name' => 'maria muhammad',
                'email' => 'maria@muhammad.com',
                'phone' => '0957495331',
                'birth_date' => '2007-9-10',
                'classroom_id' => 1,
            ],
            [
                'name' => 'Maya asaad',
                'email' => 'maya@asaad.com',
                'phone' => '0957495331',
                'birth_date' => '2005-9-10',
                'classroom_id' => 3,
            ],
            [
                'name' => 'Huda omar',
                'email' => 'huda@omar.com',
                'phone' => '0957495331',
                'birth_date' => '2005-3-10',
                'classroom_id' => 2,
            ],
            [
                'name' => 'Fatema ali',
                'email' => 'fatema@ali.com',
                'phone' => '0957421331',
                'birth_date' => null,
                'classroom_id' => 3,
            ],
            [
                'name' => 'Sami ali',
                'email' => 'sami@ali.com',
                'phone' => '0957495331',
                'birth_date' => null,
                'classroom_id' => 3,
            ],
            [
                'name' => 'Abdo amr',
                'email' => 'abdo@amr.com',
                'phone' => '0957495331',
                'birth_date' => null,
                'classroom_id' => 2,
            ],
            [
                'name' => 'Omar salm',
                'email' => 'omar@salm.com',
                'phone' => '0957585231',
                'birth_date' => null,
                'classroom_id' => 2,
            ],
        ];

        foreach($students as $student)
            {
                Student::create($student);
            }
    }
}
