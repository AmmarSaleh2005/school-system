@extends('layouts.dashboard.index')
@section('content')
<div class="p-3 mt-2">
    <form action="{{route('dashboard.tracks.store')}}" method="POST">
    @csrf
    @include('dashboard.pages.tracks._form')
</form>
</div>
@endsection
