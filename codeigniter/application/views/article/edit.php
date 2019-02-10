<div class="container">
    <h1 class="py-4">Edit article</h1>
    <?= form_open("articles/{$article['id']}/edit",
        ['method' => 'POST', 'class' => 'mt-4 mb-4'],
        ['id' => $article['id']]) ?>
    <div class="form-group">
        <label for="exampleInputTitle">Title</label>
        <input name="title" type="text" class="form-control" id="exampleInputTitle" placeholder="Some title"
               value="<?= html_escape($article['title']) ?>">
    </div>
    <div class="form-group">
        <label for="exampleSelect">Category</label>
        <select name="category_id" class="form-control" id="exampleSelect">
            <?php foreach ($categories as $category): ?>
                <option value="<?= html_escape($category['id']) ?>" <?= $category['id'] === $article['category_id'] ? 'selected' : '' ?>>
                    <?= html_escape($category['label']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputContent">Content</label>
        <textarea name="content" class="form-control" id="exampleInputContent" placeholder="Some text"
                  rows="3"><?= html_escape($article['content']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    <?= form_close() ?>
</div>