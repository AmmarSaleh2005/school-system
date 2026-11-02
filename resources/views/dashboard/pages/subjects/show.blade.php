@extends('layouts.dashboard.index')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">subject details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>subject name</th>
                                <td>{{ $subject->name }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$subject->description}}</td>
                            </tr>
                            <tr>
                                <th>Track</th>
                                <td>{{$subject->track?? '-'}}</td>
                            </tr>
                            <tr>
                                <th>Max grade</th>
                                <td>{{$subject->max_grade}}</td>
                            </tr>
                            <tr>
                                <th>Passing grade</th>
                                <td>{{$subject->description}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$subject->status}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
