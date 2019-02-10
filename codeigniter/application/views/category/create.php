<div class="container">
    <h1 class="py-4">Create article</h1>
    <?= form_open('categories/create', ['method' => 'POST', 'class' => 'mt-4 mb-4']) ?>
    <div class="form-group">
        <label for="exampleInputLabel">Label</label>
        <input name="label" type="text" class="form-control" id="exampleInputLabel" placeholder="Some label">
    </div>
    <div class="form-group">
        <label for="exampleInputDescription">Description</label>
        <textarea name="description" class="form-control" id="exampleInputDescription" placeholder="Some text"
                  rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    <?= form_close() ?>
</div>