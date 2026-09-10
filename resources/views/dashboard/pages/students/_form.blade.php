<div class="mb-3">
    <x-form.input name="name" type="text" :value="$student->name" label="Name student" placeholder="Enter name" />
</div>

<div class="mb-3">
    <x-form.input name="email" type="email" :value="$student->email" label="Email student" placeholder="example@example.com" />
</div>

<div class="mb-3">
    <x-form.input name="phone" type="text" :value="$student->phone" label="Phone student" placeholder="Enter phone" />
</div>

<div class="mb-3">
    <x-form.input name="birth_date" type="date" value="{{ $student->birth_date }}" label="Birth date"
        placeholder="Enter birth date" />
</div>

<div class="mb-3">
    <x-form.select name="classroom_id" label="Classroom" :options="$classrooms->toArray()"
        :selected="$student->classroom_id?? ''" />
</div>

<button type="submit" class="btn btn-primary">Save student</button>
