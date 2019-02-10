<div class="container">
    <article id="article-<?= html_escape($article['id']) ?>" class="mt-4 mb-4">
        <header class="article-header bg-light px-2 py-1">
            <h1>
                <span><?= html_escape($article['title']) ?></span> |
                <small><a href="<?= base_url("?category={$article['category_id']}") ?>"
                          class="badge badge-primary"
                          data-toggle="tooltip" data-placement="top"
                          title="<?= html_escape($article['description']) ?>"><?= html_escape($article['label']) ?></a>
                </small>
            </h1>
        </header>
        <p class="article-content px-2 py-1"><?= html_escape($article['content']) ?></p>
        <footer class="article-footer bg-light text-md-right px-2 py-1">
            <?= html_escape($article['created_at']) ?> - <a href="<?= base_url("?author={$article['user_id']}") ?>"
                                                              class="badge badge-danger"><?= html_escape($article['username']) ?></a>
        </footer>
    </article>
</div>