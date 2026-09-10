@extends('layouts.dashboard.index')
@section('content')
<div class="p-3 mt-2">
<form action="{{route('dashboard.teachers.update',$teacher)}}" method="POST">
    @method('PUT')
    @csrf
    @include('dashboard.pages.teachers._form')
</form>
</div>
@endsection
