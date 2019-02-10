<div class="container">
    <h1 class="py-4">Article list - edit</h1>
    <table class="table table-hover mt-4 mb-4">
        <thead class="bg-light">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $article) : ?>
        <tr>
            <td><a href="<?= site_url("articles/{$article['id']}") ?>"><?= $article['title'] ?></a></td>
            <td>
                <a href="<?= base_url("?author={$article['user_id']}") ?>"><?= $article['username'] ?></a>
            </td>
            <td>
                <a href="<?= base_url("?category={$article['category_id']}") ?>"><?= $article['label'] ?></a>
            </td>
            <td>
                <a href="<?= site_url("articles/{$article['id']}/edit") ?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>
                <a href="<?= site_url("articles/{$article['id']}/delete") ?>" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i>&nbsp;Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot class="bg-light">
        <tr>
            <td colspan="4">
                <a href="<?= site_url('articles/create') ?>" class="btn btn-primary btn-sm">New article</a>
            </td>
        </tr>
        </tfoot>
    </table>
</div>