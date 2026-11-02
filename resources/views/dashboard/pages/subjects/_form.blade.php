<div class="mb-3">
    <x-form.input name="name" type="text" :value="$subject->name" label="Name subject" placeholder="Enter name" />
</div>
<div class="mb-3">
    <x-form.textarea name="description" :value="$subject->description" label="Description subject" placeholder="Enter description" />
</div>
<div class="mb-3">
    <x-form.select name="track_id" label="Track" :options="$tracks->toArray()" :selected="$subject->track_id ?? ''" />
</div>
<div class="mb-3">
    <x-form.input name="max_grade" type="numeric" :value="$subject->max_grade" label="Max grade" placeholder="Enter " />
</div>
<div class="mb-3">
    <x-form.input name="passing_grade" type="numeric" :value="$subject->passing_grade" label="Passing grade" placeholder="Enter " />
</div>

<div class="mb-3">
    <x-form.select name="status" label="Status"
    :options="
    ['active'=>'active',
    'inactive'=>'inactive'
    ]"
    :selected="$subject->status ?? ''" />
</div>

<button type="submit" class="btn btn-primary">Save subject</button>
