@extends('layouts.dashboard.index')

@section('content')
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Class details</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>Class name</th>
                            <td>{{ $classroom->name }}</td>
                        </tr>
                        <tr>
                            <th>Class description</th>
                            <td>{{ $classroom->description }}</td>
                        </tr>
                        <tr>
                            <th>Class capacity</th>
                            <td>{{ $classroom->capacity }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection


