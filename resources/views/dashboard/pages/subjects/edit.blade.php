@extends('layouts.dashboard.index')
@section('content')
<div class="p-3 mt-2">
<form action="{{route('dashboard.subjects.update',$subject)}}" method="POST">
    @method('PUT')
    @csrf
    @include('dashboard.pages.subjects._form')
</form>
</div>
@endsection
