@extends('layouts.dashboard.index')
@section('content')
<div class="p-3 mt-2">
<form action="{{route('dashboard.gradelevels.update',$gradelevel)}}" method="POST">
    @method('PUT')
    @csrf
    @include('dashboard.pages.gradelevels._form')
</form>
</div>
@endsection
