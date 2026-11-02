<div class="mb-3">
    <x-form.input name="name" type="text" :value="$curriculum->name" label="Name student" placeholder="Enter name" />
</div>
<div class="mb-3">
    <x-form.textarea name="description" :value="$curriculum->description" label="Description student" placeholder="Enter description" />
</div>

<div class="mb-3">
    <x-form.select name="track_id" label="Track" :options="['' => 'None'] + $tracks->toArray()" :selected="$curriculum->track_id ?? ''" />
</div>

<div class="mb-3">
    <x-form.select name="grade_level_id" label="Grade level" :options="$gradelevels->toArray()" :selected="$curriculum->grade_level_id ?? ''" />
</div>

<div class="mb-3">
    <label style="margin-bottom: 0.5rem">Subjects</label>
    @foreach ($subjects as $id => $name)
        <div class="form-check">
            {{-- <input class="form-check-input" type="checkbox" name="subject_ids[]" value="{{ $id }}"
                id="subject_{{ $id }}" @checked(in_array($id, old('subject_ids', isset($curriculum) ? $curriculum->subjects->pluck('id')->all() : [])))> --}}
                <input type="checkbox" name="subject_ids[]"
                @checked($curriculum->subjects->contains('id', $curriculum->id))
                >
            <label class="form-check-label" for="subject_{{ $id }}">
                {{ $name }}
            </label>

        </div>
    @endforeach
    @error('subject_ids')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Save curriculum</button>
