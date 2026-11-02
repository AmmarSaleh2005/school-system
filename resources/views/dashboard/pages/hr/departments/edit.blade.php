@extends('layouts.dashboard.index')
@section('content')
<div class="p-3 mt-2">
<form action="{{route('dashboard.hr.departments.update',$department)}}" method="POST">
    @method('PUT')
    @csrf
    @include('dashboard.pages.hr.departments._form')
</form>
</div>
@endsection
