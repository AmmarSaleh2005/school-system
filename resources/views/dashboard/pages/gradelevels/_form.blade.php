<div class="mb-3">
    <x-form.input name="name" type="text" :value="$gradelevel->name" label="Name student" placeholder="Enter name" />
</div>
<div class="mb-3">
    <x-form.textarea name="description" :value="$gradelevel->description" label="Description student" placeholder="Enter description" />
</div>
<div class="mb-3">
    <x-form.input name="level" type="numeric" :value="$gradelevel->level" label="Name student" placeholder="Enter number" />
</div>


<button type="submit" class="btn btn-primary">Save gradelevel</button>
