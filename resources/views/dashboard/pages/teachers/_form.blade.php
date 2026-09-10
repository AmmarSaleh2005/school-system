<div class="mb-3">
    <x-form.input name="name" type="text" :value="$teacher->name" label="Name teacher" placeholder="Enter name" />
</div>

<div class="mb-3">
    <x-form.input name="email" type="email" :value="$teacher->email" label="Email teacher" placeholder="example@example.com" />
</div>

<div class="mb-3">
    <x-form.input name="phone" type="text" :value="$teacher->phone" label="Phone teacher" placeholder="Enter phone" />
</div>

<div class="mb-3">
    <x-form.input name="specialization" type="text" value="{{ $teacher->specialization }}" label="specialization"
        placeholder="Enter specialization" />
</div>

<div class="mb-3">
    <x-form.select name="classroom_id" label="Classroom" :options="$classrooms->toArray()"
        :selected="$teacher->classroom_id?? ''" />
</div>

<button type="submit" class="btn btn-primary">Save teacher</button>
