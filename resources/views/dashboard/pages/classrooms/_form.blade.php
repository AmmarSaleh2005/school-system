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
<button type="submit" class="btn btn-primary">Save class</button>
