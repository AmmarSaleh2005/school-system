<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class StudentsController extends Controller
{
    //
    public function index()
    {
        $request = request();
        $query = Student::query()->with('classroom');
        $name = $request->query('name');
        $classroomId = $request->query('classroom_id');
        if ($name) {
            $query->where('name', 'like', "%$name%");
        }
        if ($classroomId) {
            $query->where('classroom_id', $classroomId);
        }
        return view('dashboard.pages.students.index', [
            'students' => $query->latest()->paginate(10),
            'classrooms' => Classroom::pluck('name', 'id')
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.students.create', [
            'student' => new Student(),
            'classrooms' => Classroom::pluck('name', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:1'],
            'email' => ['required', 'max:150', 'unique:students,email,except,id'],
            'phone' => ['nullable', 'max:20'],
            'birth_date' => ['nullable'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
        ]);

        Student::create($request->all());

        return redirect()->route('dashboard.students.index')->with('success', 'Student created successfully!');
    }

    public function edit(Student $student)
    {

        return view(
            'dashboard.pages.students.edit',
            [
                'student' => $student,
                'classrooms' => Classroom::pluck('name', 'id'),
            ]
        );
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'max:150', 'unique:students,email,' . $student->id],
            'phone' => ['nullable', 'max:20'],
            'birth_date' => ['nullable'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
        ]);

        $student->update($request->all());

        return redirect()->route('dashboard.students.index')->with('success', 'Student updated successfully!');
    }

    public function show(Student $student)
    {
        return view('dashboard.pages.students.show', ['student' => $student]);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('dashboard.students.index')->with('success', 'Student deleted successfully!');
    }
}
