<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $articles \yii\db\ActiveRecord */

$this->title = 'Article list - home';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1 class="py-4"><?= Html::encode($this->title) ?></h1>
    <?php foreach ($articles as $article): ?>
        <article id="article-<?= Html::encode($article->id) ?>" class="mt-4 mb-4">
            <header class="article-header bg-light px-2 py-1">
                <a href="<?= Url::to("articles/{$article->id}") ?>"><?= Html::encode($article->title) ?></a> |
                <a href="<?= Url::to("/?category={$article->category->id}") ?>"
                   class="badge badge-primary"
                   data-toggle="tooltip" data-placement="top"
                   title="<?= Html::encode($article->category->description) ?>"><?= Html::encode($article->category->label) ?></a>
            </header>
            <p class="article-content px-2 py-1"><?= Html::encode($article->content) ?></p>
            <footer class="article-footer bg-light text-md-right px-2 py-1">
                <?= Html::encode($article->created_at) ?> - <a
                        href="<?= Url::to("/?author={$article->user->id}") ?>"
                        class="badge badge-danger"><?= Html::encode($article->user->username) ?></a>
            </footer>
        </article>
    <?php endforeach; ?>
</div>