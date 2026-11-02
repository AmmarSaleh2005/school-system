@extends('layouts.dashboard.index')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">gradelevel details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>gradelevel name</th>
                                <td>{{ $gradelevel->name }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $gradelevel->description }}</td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>{{ $gradelevel->level }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
