<div class="container">
    <h1 class="py-4">Edit category</h1>
    <?= form_open("categories/{$category['id']}/edit",
        ['method' => 'POST', 'class' => 'mt-4 mb-4'],
        ['id' => html_escape($category['id'])]) ?>
    <div class="form-group">
        <label for="exampleInputLabel">Label</label>
        <input name="label" type="text" class="form-control" id="exampleInputLabel" placeholder="Some label"
               value="<?= html_escape($category['label']) ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputDescription">Description</label>
        <textarea name="description" class="form-control" id="exampleInputDescription" placeholder="Some text"
                  rows="3"><?= html_escape($category['description']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    <?= form_close() ?>
</div>