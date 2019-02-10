<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $articles \yii\db\ActiveRecord */

$this->title = 'Article list - edit';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1 class="py-4"><?= Html::encode($this->title) ?></h1>
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
                <td><a href="#"><?= $article->title ?></a></td>
                <td>
                    <a href="#"><?= $article->user->username ?></a>
                </td>
                <td>
                    <a href="#"><?= $article->category->label ?></a>
                </td>
                <td>
                    <?= Html::a(Html::tag('i', '', ['class' => 'fas fa-pencil-alt']) . ' Edit', [
                        'update', 'id' => $article->id], ['class' => 'btn btn-primary btn-sm']) ?>
                    <?= Html::a(Html::tag('i', '', ['class' => 'fas fa-trash-alt']) . ' Delete', [
                        'delete', 'id' => $article->id], [
                        'class' => 'btn btn-danger btn-sm',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot class="bg-light">
        <tr>
            <td colspan="4">
                <a href="<?= Url::to('articles/create') ?>" class="btn btn-primary btn-sm">New article</a>
            </td>
        </tr>
        </tfoot>
    </table>
</div>