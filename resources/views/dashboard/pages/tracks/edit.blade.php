@extends('layouts.dashboard.index')
@section('content')
<div class="p-3 mt-2">
<form action="{{route('dashboard.tracks.update',$track)}}" method="POST">
    @method('PUT')
    @csrf
    @include('dashboard.pages.tracks._form')
</form>
</div>
@endsection
