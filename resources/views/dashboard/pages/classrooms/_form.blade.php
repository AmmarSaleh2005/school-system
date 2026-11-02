<div class="mb-3">
    <x-form.input name="name" type="text" :value="$classroom->name" label="Name class" placeholder="Enter name" />
</div>


<div class="mb-3">
    <x-form.textarea name="description" :value="$classroom->description" label="Description class" placeholder="Enter description" />
</div>

<div class="mb-3">
    <x-form.input type="numeric" class="form-control" name="capacity" value="{{ $classroom->capacity }}"
        label="Capacity" placeholder="Enter number" />
</div>

<div class="mb-3">
    <x-form.select name="track_id" label="Track" :options="['' => 'None'] + $tracks->toArray()" :selected="$classroom->track_id ?? ''" />
</div>

<div class="mb-3">
    <x-form.select name="grade_level_id" label="Grade level" :options="$gradelevels" :selected="$classroom->grade_level_id ?? ''" />
</div>
<div class="mb-3">
    <x-form.select name="curriculum_id" label="Grade level" :options="$curricula" :selected="$classroom->curriculum_id ?? ''" />
</div>
<button type="submit" class="btn btn-primary">Save class</button>
