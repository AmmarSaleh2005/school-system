<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\GradeLevel;
use Illuminate\Http\Request;

class GradeLevelsController extends Controller
{
    //
    public function index()
    {
        // $request = request();
        // $query = gradelevel::query()->with('classroom');
        // $name = $request->query('name');
        // $classroomId = $request->query('classroom_id');
        // if ($name) {
        //     $query->where('name', 'like', "%$name%");
        // }
        // if ($classroomId) {
        //     $query->where('classroom_id', $classroomId);
        // }
        return view('dashboard.pages.gradelevels.index', [
            'gradelevels' => GradeLevel::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.gradelevels.create', [
            'gradelevel' => new gradelevel(),
        ]);
    }

    protected function validated(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['nullable'],
            'level' => ['max:13', 'min:10', 'numeric'],
        ]);
    }

    public function store(Request $request)
    {
        gradelevel::create($this->validated($request));
        return redirect()->route('dashboard.gradelevels.index')->with('success', 'gradelevel created successfully!');
    }

    public function edit(gradelevel $gradelevel)
    {
        return view(
            'dashboard.pages.gradelevels.edit',
            [
                'gradelevel' => $gradelevel,
            ]
        );
    }

    public function update(Request $request, gradelevel $gradelevel)
    {
        $gradelevel->update($this->validated($request));

        return redirect()->route('dashboard.gradelevels.index')->with('success', 'gradelevel updated successfully!');
    }

    public function show(gradelevel $gradelevel)
    {
        return view('dashboard.pages.gradelevels.show', ['gradelevel' => $gradelevel]);
    }

    public function destroy(gradelevel $gradelevel)
    {
        $gradelevel->delete();
        return redirect()->route('dashboard.gradelevels.index')->with('success', 'gradelevel deleted successfully!');
    }
}
