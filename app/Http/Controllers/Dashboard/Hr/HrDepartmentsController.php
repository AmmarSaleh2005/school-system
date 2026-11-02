<?php

namespace App\Http\Controllers\Dashboard\Hr;

use App\Http\Controllers\Controller;
use App\Models\HrDepartment;
use Illuminate\Http\Request;

class HrDepartmentsController extends Controller
{
    //
    public function index()
    {
        // $request = request();
        // $query = department::query()->with('classroom');
        // $name = $request->query('name');
        // $classroomId = $request->query('classroom_id');
        // if ($name) {
        //     $query->where('name', 'like', "%$name%");
        // }
        // if ($classroomId) {
        //     $query->where('classroom_id', $classroomId);
        // }
        return view('dashboard.pages.hr.departments.index', [
            'departments' => HrDepartment::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.hr.departments.create', [
            'department' => new HrDepartment(),

        ]);
    }

    protected function validated(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['nullable'],
            'status'=>['required', 'in:active,inactive']
        ]);
    }

    public function store(Request $request)
    {
        HrDepartment::create($this->validated($request));
        return redirect()->route('dashboard.hr.departments.index')->with('success', 'Department created successfully!');
    }

    public function edit(HrDepartment $department)
    {
        return view(
            'dashboard.pages.hr.departments.edit',
            [
                'department' => $department,
            ]
        );
    }

    public function update(Request $request, HrDepartment $department)
    {
        $department->update($this->validated($request));

        return redirect()->route('dashboard.hr.departments.index')->with('success', 'Department updated successfully!');
    }

    public function show(HrDepartment $department)
    {
        return view('dashboard.pages.hr.departments.show', ['department' => $department]);
    }

    public function destroy(HrDepartment $department)
    {
        $department->delete();
        return redirect()->route('dashboard.hr.departments.index')->with('success', 'Department deleted successfully!');
    }
}
