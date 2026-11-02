@php
    $current = $current?? '';
@endphp
<div class="mb-3">
    <a href="{{route('dashboard.hr.index')}}" class="btn {{$current === 'overview'? 'btn-primary' : 'btn-outline-primary'}}">Overview</a>
    <a href="{{route('dashboard.hr.departments.index')}}" class="btn {{$current === 'departments'? 'btn-primary' : 'btn-outline-primary'}}">Departments</a>
</div>
