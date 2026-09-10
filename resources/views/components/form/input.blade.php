@props([
    'name',
    'type' => 'text',
    'value' => '',
    'label' => '',
    'placeholder' => ''
])

<label for="{{ $name }}" class="form-label">
    {{ $label }}
</label>

<input
    id="{{ $name }}"
    type="{{ $type }}"
    class="form-control
    @error($name)
    is-invalid
    @enderror
    "
    name="{{ $name }}"
    value="{{ old($name,$value) }}"
    placeholder="{{ $placeholder }}"
>
@error($name)
<div class="alert alert-danger">{{$message}}</div>
@enderror
