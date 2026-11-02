@extends('layouts.dashboard.index')
@section('content')
<div class="p-3 mt-2">
    <form action="{{route('dashboard.subjects.store')}}" method="POST">
    @csrf
    @include('dashboard.pages.subjects._form')
</form>
</div>
@endsection
