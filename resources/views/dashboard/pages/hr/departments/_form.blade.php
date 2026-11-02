<div class="mb-3">
    <x-form.input name="name" type="text" :value="$department->name" label="Name department" placeholder="Enter name" />
</div>
<div class="mb-3">
    <x-form.textarea name="description" :value="$department->description" label="Description department" placeholder="Enter description" />
</div>

<div class="mb-3">
    <x-form.select name="status" label="Status"
    :options="
    ['active'=>'active',
    'inactive'=>'inactive'
    ]"
    :selected="$department->status ?? ''" />
</div>

<button type="submit" class="btn btn-primary">Save department</button>
