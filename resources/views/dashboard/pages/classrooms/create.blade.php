@extends('layouts.dashboard.index')
@section('content')
<div class="p-3 mt-2">
    <form action="{{route('dashboard.classrooms.store')}}" method="POST">
    @csrf
    @include('dashboard.pages.classrooms._form')
</form>
</div>
@endsection
