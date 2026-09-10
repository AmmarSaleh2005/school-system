@extends('layouts.dashboard.index')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Teacher details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Teacher name</th>
                                <td>{{ $teacher->name }}</td>
                            </tr>
                            <tr>
                                <th>Teacher classroom</th>
                                <td>{{ $teacher->classroom->name ?? 'null' }}</td>
                            </tr>
                            <tr>
                                <th>Teacher email</th>
                                <td>{{ $teacher->email }}</td>
                            </tr>
                            <tr>
                                <th>Teacher phone</th>
                                <td>{{ $teacher->phone }}</td>
                            </tr>
                            <tr>
                                <th>Teacher specialization</th>
                                <td>{{ $teacher->specialization }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
