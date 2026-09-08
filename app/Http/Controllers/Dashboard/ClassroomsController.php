<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomsController extends Controller
{
    //
    public function index()
    {
        $request = request();
        $query = Classroom::query();
        $name = $request->query('name');
        if($name)
            {
                $query->where('name', 'like', "%$name%");
            }
        return view('dashboard.pages.classrooms.index', ['classrooms'=>$query->paginate(5)]);
    }

    public function create()
    {
        $classroom = new Classroom();
        return view('dashboard.pages.classrooms.create', ['classroom'=>$classroom]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:1'],
            'description'=>['nullable', 'max:255'],
            'capacity'=> ['numeric', 'min:1']
        ]);

        Classroom::create($request->all());

        return redirect()->route('dashboard.classrooms.index')->with('success','Class created successfully!');
    }

    public function edit(Classroom $classroom)
    {
        Classroom::find($classroom);
        return view('dashboard.pages.classrooms.edit', ['classroom'=>$classroom]);
    }

     public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name' => ['required', 'min:1'],
            'description'=>['nullable', 'max:255'],
            'capacity'=> ['numeric', 'min:1']
        ]);

        $classroom->update($request->all());

        return redirect()->route('dashboard.classrooms.index')->with('success','Class updated successfully!');
    }

    public function show(Classroom $classroom)
    {
        return view('dashboard.pages.classrooms.show', ['classroom'=>$classroom]);
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('dashboard.classrooms.index')->with('success','Class deleted successfully!');
    }
}
