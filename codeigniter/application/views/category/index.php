<div class="container">
    <h1 class="py-4">Category list - edit</h1>
    <table class="table table-hover mt-4 mb-4">
        <thead class="bg-light">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><a href="<?= site_url("categories/{$category['id']}") ?>"><?= html_escape($category['label']) ?></a></td>
                <td><?= html_escape($category['description']) ?></td>
                <td>
                    <a href="<?= site_url("categories/{$category['id']}/edit") ?>" class="btn btn-primary btn-sm"><i
                                class="fas fa-pencil-alt"></i>
                        Edit</a>
                    <a href="<?= site_url("categories/{$category['id']}/delete") ?>" class="btn btn-danger btn-sm"><i
                                class="fas fa-trash-alt"></i>
                        Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot class="bg-light">
        <tr>
            <td colspan="3">
                <a href="<?= site_url('categories/create') ?>" class="btn btn-primary btn-sm">New category</a>
            </td>
        </tr>
        </tfoot>
    </table>
</div>