@props([
    'name',
    'value' => '',
    'label' => '',
    'placeholder' => ''
])

<label for="{{ $name }}" class="form-label">
    {{ $label }}
</label>
<textarea name="{{ $name }}" id="{{ $name }}" class="form-control" cols="30" rows="3" placeholder="{{ $placeholder }}">{{old($name ,$value )}}</textarea>
@error($name)
<div class="alert alert-danger">{{$message}}</div>
@enderror
