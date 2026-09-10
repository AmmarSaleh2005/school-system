@extends('layouts.dashboard.index')
@section('content')
<div class="p-3 mt-2">
    <form action="{{route('dashboard.students.store')}}" method="POST">
    @csrf
    @include('dashboard.pages.students._form')
</form>
</div>
@endsection
