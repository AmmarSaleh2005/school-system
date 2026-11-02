<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\GradeLevel;
use App\Models\Subject;
use App\Models\Track;
use Illuminate\Http\Request;

class CurriculaController extends Controller
{
    //
    public function index()
    {
        // $request = request();
        // $query = curriculum::query()->with('classroom');
        // $name = $request->query('name');
        // $classroomId = $request->query('classroom_id');
        // if ($name) {
        //     $query->where('name', 'like', "%$name%");
        // }
        // if ($classroomId) {
        //     $query->where('classroom_id', $classroomId);
        // }
        return view('dashboard.pages.curricula.index', [
            'curricula' => Curriculum::with(['gradelevel', 'track'])->get()
        ]);
    }

    public function subjects(Curriculum $curriculum)
    {
        return view('dashboard.pages.curricula.subjects', [
            'subjects' => $curriculum->subjects()->paginate(10),
            'curriculum' => $curriculum
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.curricula.create', [
            'curriculum' => new curriculum(),
            'tracks' => Track::pluck('name', 'id'),
            'gradelevels' => GradeLevel::pluck('name', 'id'),
            'subjects' => Subject::pluck('name', 'id'),
        ]);
    }

    protected function validated(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['nullable'],
            'grade_level_id' => ['required', 'exists:grade_levels,id'],
            'track_id' => ['nullable', 'exists:tracks,id'],
            'subject_ids' => ['required', 'array', 'min:1'],
            'subject_ids.*' => ['required', 'integer', 'exists:subjects,id',],

        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $curriculum = Curriculum::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'grade_level_id' => $data['grade_level_id'],
            'track_id' => $data['track_id'] ?? null,
        ]);

        $curriculum->subjects()->sync($data['subject_ids']);

        return redirect()
            ->route('dashboard.curricula.index')
            ->with('success', 'Curriculum created successfully!');
    }

    public function edit(curriculum $curriculum)
    {
        return view('dashboard.pages.curricula.edit',
            [
                'curriculum' => $curriculum->load('subjects'),
                'tracks' => Track::pluck('name', 'id'),
                'gradelevels' => GradeLevel::pluck('name', 'id'),
                'subjects' => Subject::pluck('name', 'id'),
            ]
        );
    }

    public function update(Request $request, curriculum $curriculum)
    {
        $data = $this->validated($request);
        $curriculum->update([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'grade_level_id' => $data['grade_level_id'],
            'track_id' => $data['track_id'] ?? null,
        ]);

        $curriculum->subjects()->sync($data['subject_ids']);

        return redirect()->route('dashboard.curricula.index')->with('success', 'curriculum updated successfully!');
    }

    public function show(curriculum $curriculum)
    {
        return view('dashboard.pages.curricula.show', ['curriculum' => $curriculum]);
    }

    public function destroy(curriculum $curriculum)
    {
        $curriculum->delete();
        return redirect()->route('dashboard.curricula.index')->with('success', 'curriculum deleted successfully!');
    }
}
