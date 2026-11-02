<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Curriculum;
use App\Models\GradeLevel;
use App\Models\Teacher;
use App\Models\Track;

class ClassroomsController extends Controller
{
    //
    public function index()
    {
        $request = request();
        $query = Classroom::query();
        $name = $request->query('name');
        if ($name) {
            $query->where('name', 'like', "%$name%");
        }
        return view(
            'dashboard.pages.classrooms.index',
            [
                'classrooms' => $query->withCount(['students', 'teachers'])->paginate(10),

            ]
        );
    }

    public function create()
    {
        $classroom = new Classroom();
        return view(
            'dashboard.pages.classrooms.create',
            [
                'classroom' => $classroom,
                'curricula' => Curriculum::pluck('name', 'id'),
                'gradelevels' => GradeLevel::pluck('name', 'id'),
                'tracks' => Track::pluck('name', 'id'),
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:1', 'unique:classrooms,name,except,id'],
            'description' => ['nullable', 'max:255'],
            'capacity' => ['numeric', 'min:1'],
            'curriculum_id' => ['nullable', 'exists:curricula,id'],
            'grade_level_id' => ['nullable', 'exists:grade_levels,id'],
            'track_id' => ['nullable', 'exists:tracks,id'],
        ]);

        Classroom::create($request->all());

        return redirect()->route('dashboard.classrooms.index')->with('success', 'Class created successfully!');
    }

    public function edit(Classroom $classroom)
    {
        return view('dashboard.pages.classrooms.edit', [
            'classroom' => $classroom,
            'curricula' => Curriculum::pluck('name', 'id'),
            'gradelevels' => GradeLevel::pluck('name', 'id'),
            'tracks' => Track::pluck('name', 'id'),
        ]);
    }

    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name' => ['required', 'min:1'],
            'description' => ['nullable', 'max:255'],
            'capacity' => ['numeric', 'min:1'],
            'curriculum_id' => ['nullable', 'exists:curricula,id'],
            'grade_level_id' => ['nullable', 'exists:grade_levels,id'],
            'track_id' => ['nullable', 'exists:tracks,id'],
        ]);

        $classroom->update($request->all());

        return redirect()->route('dashboard.classrooms.index')->with('success', 'Class updated successfully!');
    }

    public function show(Classroom $classroom)
    {
        return view('dashboard.pages.classrooms.show', ['classroom' => $classroom]);
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('dashboard.classrooms.index')->with('success', 'Class deleted successfully!');
    }

    public function teachers(Classroom $classroom)
    {
        return view('dashboard.pages.classrooms.teachers', [
            'classroom' => $classroom,
            'teachers' => $classroom->teachers()->paginate(10)
        ]);
    }
    public function students(Classroom $classroom)
    {
        return view('dashboard.pages.classrooms.students', [
            'classroom' => $classroom,
            'students' => $classroom->students()->paginate(10)
        ]);
    }
}
