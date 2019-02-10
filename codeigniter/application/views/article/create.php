<div class="container">
    <h1 class="py-4">Create article</h1>
    <?= form_open('articles/create', ['method' => 'POST', 'class' => 'mt-4 mb-4']) ?>
    <div class="form-group">
        <label for="exampleInputTitle">Title</label>
        <input name="title" type="text" class="form-control" id="exampleInputTitle" placeholder="Some title">
    </div>
    <div class="form-group">
        <label for="exampleSelect">Category</label>
        <select name="category_id" class="form-control" id="exampleSelect">
            <?php foreach ($categories as $category): ?>
                <option value="<?= html_escape($category['id']) ?>"><?= html_escape($category['label']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputContent">Content</label>
        <textarea name="content" class="form-control" id="exampleInputContent" placeholder="Some text"
                  rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    <?= form_close() ?>
</div>