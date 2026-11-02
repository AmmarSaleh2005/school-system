<div class="mb-3">
    <x-form.input name="name" type="text" :value="$track->name" label="Name student" placeholder="Enter name" />
</div>
<div class="mb-3">
    <x-form.textarea name="description" :value="$track->description" label="Description student" placeholder="Enter description" />
</div>



<button type="submit" class="btn btn-primary">Save track</button>
