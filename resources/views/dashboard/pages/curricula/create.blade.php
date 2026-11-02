@extends('layouts.dashboard.index')
@section('content')
<div class="p-3 mt-2">
    <form action="{{route('dashboard.curricula.store')}}" method="POST">
    @csrf
    @include('dashboard.pages.curricula._form')
</form>
</div>
@endsection
