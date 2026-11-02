<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;

class TracksController extends Controller
{
    public function index()
    {
        // $request = request();
        // $query = track::query()->with('classroom');
        // $name = $request->query('name');
        // $classroomId = $request->query('classroom_id');
        // if ($name) {
        //     $query->where('name', 'like', "%$name%");
        // }
        // if ($classroomId) {
        //     $query->where('classroom_id', $classroomId);
        // }
        return view('dashboard.pages.tracks.index', [
            'tracks' => Track::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.tracks.create', [
            'track' => new track(),

        ]);
    }

    protected function validated(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['nullable']
        ]);
    }

    public function store(Request $request)
    {
        track::create($this->validated($request));
        return redirect()->route('dashboard.tracks.index')->with('success', 'Track created successfully!');
    }

    public function edit(track $track)
    {
        return view(
            'dashboard.pages.tracks.edit',
            [
                'track' => $track,
            ]
        );
    }

    public function update(Request $request, track $track)
    {
        $track->update($this->validated($request));

        return redirect()->route('dashboard.tracks.index')->with('success', 'Track updated successfully!');
    }

    public function show(track $track)
    {
        return view('dashboard.pages.tracks.show', ['track' => $track]);
    }

    public function destroy(track $track)
    {
        $track->delete();
        return redirect()->route('dashboard.tracks.index')->with('success', 'Track deleted successfully!');
    }
}
