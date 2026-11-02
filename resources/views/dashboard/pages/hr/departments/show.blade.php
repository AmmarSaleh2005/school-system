@extends('layouts.dashboard.index')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Department details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Department name</th>
                                <td>{{ $department->name }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$department->description}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$department->status}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
