@extends('layouts.dashboard.index')
@section('content')
<div class="p-3 mt-2">
<form action="{{route('dashboard.classrooms.update',$classroom)}}" method="POST">
    @method('PUT')
    @csrf
    @include('dashboard.pages.classrooms._form')
</form>
</div>
@endsection
