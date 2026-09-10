@extends('layouts.dashboard.index')
@section('content')
<div class="container-fluid" style="margin-top: 1.5rem">

    {{-- Welcome --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">

            <h2 class="fw-bold mb-2">
                👋 Welcome back, {{ auth()->user()->name }}!
            </h2>

            <p class="text-muted mb-0">
                Here's what's happening in your school today.
            </p>

        </div>
    </div>


    {{-- Statistics --}}
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                Teachers
                            </p>

                            <h3 class="fw-bold mb-0">
                                5
                            </h3>
                        </div>

                        <i class="bi bi-person-workspace fs-2 text-primary"></i>

                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                Students
                            </p>

                            <h3 class="fw-bold mb-0">
                                50
                            </h3>
                        </div>

                        <i class="bi bi-mortarboard fs-2 text-success"></i>

                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                Classrooms
                            </p>

                            <h3 class="fw-bold mb-0">
                                7
                            </h3>
                        </div>

                        <i class="bi bi-building fs-2 text-warning"></i>

                    </div>

                </div>
            </div>
        </div>

    </div>


    {{-- Quick Actions --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <h5 class="fw-bold mb-3">
                Quick actions
            </h5>

            <div class="d-flex flex-wrap gap-2">

                <a href="{{ route('dashboard.teachers.create') }}"
                   class="btn btn-primary">
                    <i class="bi bi-person-plus me-1"></i>
                    New teacher
                </a>

                <a href="{{ route('dashboard.students.create') }}"
                   class="btn btn-success">
                    <i class="bi bi-person-plus me-1"></i>
                    New student
                </a>

                <a href="{{ route('dashboard.classrooms.index') }}"
                   class="btn btn-outline-secondary">
                    <i class="bi bi-building me-1"></i>
                    View classrooms
                </a>

            </div>

        </div>

    </div>


    {{-- Recent Activity --}}
    {{-- Recent Activities --}}
<div class="card border-0 shadow-sm">

    <div class="card-body">

        <h5 class="fw-bold mb-3">
            Recent activities
        </h5>

        <div class="row g-3">

            <div class="col-md-4">
                <div class="border rounded p-3">
                    <div class="text-muted small">
                        New teachers this month
                    </div>
                    <h3 class="fw-bold mb-0">5</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="border rounded p-3">
                    <div class="text-muted small">
                        New students this month
                    </div>
                    <h3 class="fw-bold mb-0">24</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="border rounded p-3">
                    <div class="text-muted small">
                        New classrooms
                    </div>
                    <h3 class="fw-bold mb-0">2</h3>
                </div>
            </div>

        </div>

    </div>

</div>

</div>
@endsection
