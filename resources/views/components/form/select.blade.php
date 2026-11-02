@props(['name', 'label' => '', 'options' => [], 'selected'])
<label for="{{ $name }}" class="form-label">{{ $label }}</label>
<select name="{{ $name }}" id="{{ $name }}" class="form-select
@error($name)
    is-invalid
    @enderror">

    @foreach ($options as $value => $text)
        <option value="{{ $value }}" @if ($value == old($name, $selected)) selected @endif>
            {{ $text }}
        </option>
    @endforeach
</select>
 @error($name)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
