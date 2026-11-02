@extends('layouts.dashboard.index')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Track details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Track name</th>
                                <td>{{ $track->name }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$track->description}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
