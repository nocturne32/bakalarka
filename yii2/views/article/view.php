<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $article app\models\Article */

$this->title = $article->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container">
    <article id="article-<?= Html::encode($article->id) ?>" class="mt-4 mb-4">
        <header class="article-header bg-light px-2 py-1">
            <h1>
                <span><?= Html::encode($article->title) ?></span> |
                <small><a href="<?= Url::to("/?category={$article->category->id}") ?>"
                          class="badge badge-primary"
                          data-toggle="tooltip" data-placement="top"
                          title="<?= Html::encode($article->category->description) ?>"><?= Html::encode($article->category->label) ?></a>
                </small>
            </h1>
        </header>
        <p class="article-content px-2 py-1"><?= Html::encode($article->content) ?></p>
        <footer class="article-footer bg-light text-md-right px-2 py-1">
            <?= Html::encode($article->created_at) ?> - <a href="<?= Url::to("/?author={$article->user->id}") ?>"
                                                           class="badge badge-danger"><?= Html::encode($article->user->username) ?></a>
        </footer>
    </article>
</div>
