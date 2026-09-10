<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;


class TeachersController extends Controller
{
    //
    public function index()
    {
        $request = request();
        $query = Teacher::query()->with('classroom');
        $name = $request->query('name');
        $classroomId = $request->query('classroom_id');
        if ($name) {
            $query->where('name', 'like', "%$name%");
        }
        if ($classroomId) {
            $query->where('classroom_id', $classroomId);
        }
        return view('dashboard.pages.teachers.index', [
            'teachers' => $query->latest()->paginate(10),
            'classrooms' => Classroom::pluck('name', 'id')
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.teachers.create', [
            'teacher' => new Teacher(),
            'classrooms' => Classroom::pluck('name', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:1'],
            'email' => ['required', 'max:150', 'unique:teachers,email,except,id'],
            'phone' => ['nullable', 'max:20'],
            'specialization' => ['nullable', 'max:100'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
        ]);

        Teacher::create($request->all());

        return redirect()->route('dashboard.teachers.index')->with('success', 'Teacher created successfully!');
    }

    public function edit(Teacher $teacher)
    {

        return view(
            'dashboard.pages.teachers.edit',
            [
                'teacher' => $teacher,
                'classrooms' => Classroom::pluck('name', 'id'),
            ]
        );
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => ['required', 'min:1'],
            'email' => ['required', 'max:150', 'unique:teachers,email,' . $teacher->id],
            'phone' => ['nullable', 'max:20'],
            'specialization' => ['nullable', 'max:100'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
        ]);

        $teacher->update($request->all());

        return redirect()->route('dashboard.teachers.index')->with('success', 'Teacher updated successfully!');
    }

    public function show(Teacher $teacher)
    {
        return view('dashboard.pages.teachers.show', ['teacher' => $teacher]);
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('dashboard.teachers.index')->with('success', 'Teacher deleted successfully!');
    }
}
