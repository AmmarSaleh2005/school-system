@extends('layouts.dashboard.index')
@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="mb-0 fs-3">Teachers</h1>
                    </div>
                    <div class="col-sm-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">teachers</li>
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

                {{-- teachers Tabeles --}}

                <x-flash-message />
                <div class="card">

                    <div class="card-body">
                        <div class="container-fluid">


                            <!-- Toolbar -->

                            <div class="card-header d-flex align-items-end gap-2">

                                <h3 class="card-title mb-0 me-auto">
                                    All teachers
                                </h3>

                                <form action="{{ URL::current() }}" method="GET" class="d-flex align-items-end gap-2">

                                    {{-- Search --}}
                                    <div class="input-group input-group-sm" style="width: 16rem">

                                        <button type="button" class="btn btn-outline-secondary" title="reset"
                                            id="resetBtn">
                                            <i class="bi bi-arrow-counterclockwise"></i>
                                        </button>

                                        <button type="submit" class="btn btn-outline-secondary" title="search">
                                            <i class="bi bi-search"></i>
                                        </button>

                                        <input type="search" class="form-control" name="name"
                                            value="{{ request()->query('name') }}" placeholder="Search teachers…">
                                    </div>


                                    <div style="width: 10rem; height:3.5rem;">
                                        <x-form.select name="classroom_id" :options="['' => 'all classrooms'] + $classrooms->toArray()" :selected="request()->query('classroom_id', '')" />
                                    </div>

                                </form>

                                {{-- New teacher --}}
                                <a href="{{ route('dashboard.teachers.create') }}">
                                    <button class="btn btn-primary btn-sm" type="button">
                                        <i class="bi bi-plus-lg me-1"></i>
                                        New teacher
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
                                                <th>Classroom</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Specialization</th>
                                                <th>Due</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teachers as $item)
                                                <tr>
                                                    <td class="col-id">{{$item->id}}</td>
                                                    <td>
                                                        <a href="#" class="fw-semibold text-decoration-none">
                                                            {{ $item->name }}
                                                        </a>

                                                    </td>
                                                    <td class="fw-semibold text-decoration-none">

                                                        {{ $item->classroom->name ?? 'null' }}
                                                    </td>
                                                    <td class="fw-semibold text-decoration-none">
                                                        {{ $item->email }}
                                                    </td>


                                                    <td class="text-nowrap">{{ $item->phone }}</td>
                                                    <td class="text-nowrap">{{ $item->specialization }}</td>
                                                    <td class="text-nowrap">{{ $item->created_at->format('Y-m-d') }}</td>

                                                    <td class="text-center">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('dashboard.teachers.show', $item) }}">
                                                                <button class="btn btn-outline-secondary" type="button"
                                                                    title="Show">
                                                                    <i class="bi bi-eye" aria-hidden="true"></i>
                                                                </button></a>
                                                            <a href="{{ route('dashboard.teachers.edit', $item) }}">
                                                                <button class="btn btn-outline-secondary" type="button"
                                                                    title="Edit">
                                                                    <i class="bi bi-pencil" aria-hidden="true"></i>
                                                                </button></a>
                                                            <form action="{{ route('dashboard.teachers.destroy', $item) }}"
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
                                        <small class="text-secondary"> </small>
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
            window.location.href = '{{ route('dashboard.teachers.index') }}';
        });
    </script>
@endpush
