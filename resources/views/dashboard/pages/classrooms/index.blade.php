@extends('layouts.dashboard.index')
@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="mb-0 fs-3">Classrooms</h1>
                    </div>
                    <div class="col-sm-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Classrooms</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <!-- Summary cards -->
                <div class="row g-3 mb-3">
                    <div class="col-md-3 col-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <p class="text-secondary small mb-1">Active classrooms</p>
                                <h3 class="mb-0 fw-bold">6</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <p class="text-secondary small mb-1">Student</p>
                                <h3 class="mb-0 fw-bold text-success">50</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <p class="text-secondary small mb-1">Teachers</p>
                                <h3 class="mb-0 fw-bold text-warning">5</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <p class="text-secondary small mb-1">Completed classrooms</p>
                                <h3 class="mb-0 fw-bold text-secondary">1</h3>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Classrooms Tabeles --}}

                <x-flash-message />
                <div class="card">

                    <div class="card-body">
                        <div class="container-fluid">


                            <!-- Toolbar -->

                            <div class="card-header d-flex flex-wrap gap-2 align-items-center">
                                <h3 class="card-title mb-0 me-auto">All classrooms</h3>

                                <form action="{{ URL::current() }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 16rem">
                                        <button type="button" class="btn btn-outline-secondary" title="reset"
                                            id="resetBtn">
                                            <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i>
                                        </button>

                                        <button type="submit" class="btn btn-outline-secondary" title="search">
                                            <i class="bi bi-search" aria-hidden="true"></i>
                                        </button>

                                        <input type="search" class="form-control" name="name"
                                            value="{{ request()->query('name') }}" placeholder="Search classrooms&hellip;"
                                            aria-label="Search classrooms" />
                                    </div>
                                </form>

                                <a href="{{ route('dashboard.classrooms.create') }}">
                                    <button class="btn btn-primary btn-sm" type="button">
                                        <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>
                                        New Classroom
                                    </button>
                                </a>
                            </div>



                            <div class="card-body p-0">
                                <div class="table-responsive">


                                    <table class="table align-middle mb-0" style="text-align:center;">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Teachers count</th>
                                                <th>Students count</th>
                                                <th>Capacity</th>
                                                <th>Due</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($classrooms as $item)
                                                <tr>
                                                    <td class="col-id">
                                                        {{ $item->id }}
                                                    </td>
                                                    <td>
                                                        <a href="#" class="fw-semibold text-decoration-none">
                                                            {{ $item->name }}
                                                        </a>

                                                    </td>
                                                    <td class="fw-semibold text-decoration-none">
                                                        {{ $item->description }}
                                                    </td>
                                                    <td class="fw-semibold text-decoration-none">
                                                        {{ $item->teachers_count }}
                                                    </td>
                                                    <td class="fw-semibold text-decoration-none">
                                                        {{ $item->students_count }}
                                                    </td>



                                                    <td class="text-nowrap">{{ $item->capacity }}</td>
                                                    <td class="text-nowrap">{{ $item->created_at?->format('Y-m-d') }}</td>

                                                    <td class="text-center">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('dashboard.classrooms.teachers', $item) }}">
                                                                <button class="btn btn-outline-secondary" type="button"
                                                                    title="Teachers">
                                                                    <i class="bi bi-person-workspace"
                                                                        aria-hidden="true"></i>
                                                                </button>
                                                            </a>
                                                            <a href="{{ route('dashboard.classrooms.students', $item) }}">
                                                                <button class="btn btn-outline-secondary" type="button"
                                                                    title="Students">
                                                                    <i class="bi bi-people" aria-hidden="true"></i>
                                                                </button>
                                                            </a>
                                                            <a href="{{ route('dashboard.classrooms.show', $item) }}">
                                                                <button class="btn btn-outline-secondary" type="button"
                                                                    title="Show">
                                                                    <i class="bi bi-eye" aria-hidden="true"></i>
                                                                </button>
                                                            </a>

                                                            <a href="{{ route('dashboard.classrooms.edit', $item) }}">
                                                                <button class="btn btn-outline-secondary" type="button"
                                                                    title="Edit">
                                                                    <i class="bi bi-pencil" aria-hidden="true"></i>
                                                                </button></a>
                                                            <form
                                                                action="{{ route('dashboard.classrooms.destroy', $item) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-outline-secondary"
                                                                    title="delete">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <small class="text-secondary">  </small>

                                        <nav aria-label="Pagination">
                                             <ul class="pagination pagination-sm mb-0">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#">Previous</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#">Next</a>
                                                    </li>
                                                </ul>

                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </main>
@endsection
@push('scripts')
    <script>
        document.getElementById('resetBtn').addEventListener('click', function() {
            window.location.href = '{{ route('dashboard.classrooms.index') }}';
        });
    </script>
@endpush
