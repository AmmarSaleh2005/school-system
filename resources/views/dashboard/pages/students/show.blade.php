@extends('layouts.dashboard.index')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">student details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Student name</th>
                                <td>{{ $student->name }}</td>
                            </tr>
                            <tr>
                                <th>Student classroom</th>
                                <td>{{ $student->classroom->name ?? 'null' }}</td>
                            </tr>
                            <tr>
                                <th>Student email</th>
                                <td>{{ $student->email }}</td>
                            </tr>
                            <tr>
                                <th>Student phone</th>
                                <td>{{ $student->phone }}</td>
                            </tr>
                            <tr>
                                <th>Student birth_date</th>
                                <td>{{ $student->birth_date }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
