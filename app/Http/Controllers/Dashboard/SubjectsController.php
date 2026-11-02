<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Track;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    //
    public function index()
    {
        // $request = request();
        // $query = subject::query()->with('classroom');
        // $name = $request->query('name');
        // $classroomId = $request->query('classroom_id');
        // if ($name) {
        //     $query->where('name', 'like', "%$name%");
        // }
        // if ($classroomId) {
        //     $query->where('classroom_id', $classroomId);
        // }
        return view('dashboard.pages.subjects.index', [
            'subjects' => Subject::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.subjects.create', [
            'subject' => new subject(),
            'tracks' => Track::pluck('name', 'id'),
        ]);
    }

    protected function validated(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['nullable'],
            'max_grade' => ['max:100', 'numeric'],
            'passing_grade' => ['max:100', 'numeric'],
            'track_id' => ['nullable', 'exists:tracks,id'],
            'status' => ['required','in:active,inactive']
        ]);
    }

    public function store(Request $request)
    {
        subject::create($this->validated($request));
        return redirect()->route('dashboard.subjects.index')->with('success', 'subject created successfully!');
    }

    public function edit(subject $subject)
    {
        return view(
            'dashboard.pages.subjects.edit',
            [
                'subject' => $subject,
                'tracks' => Track::pluck('name', 'id'),
            ]
        );
    }

    public function update(Request $request, subject $subject)
    {
        $subject->update($this->validated($request));

        return redirect()->route('dashboard.subjects.index')->with('success', 'subject updated successfully!');
    }

    public function show(subject $subject)
    {
        return view('dashboard.pages.subjects.show', ['subject' => $subject]);
    }

    public function destroy(subject $subject)
    {
        $subject->delete();
        return redirect()->route('dashboard.subjects.index')->with('success', 'subject deleted successfully!');
    }
}
