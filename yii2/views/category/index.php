<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $categories \app\models\Category */

$this->title = 'Category list - edit';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <h1 class="py-4"><?= Html::encode($this->title) ?></h1>
    <table class="table table-hover mt-4 mb-4">
        <thead class="bg-light">
        <tr>
            <th>Label</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><a href="<?= Url::to("/?category={$category->id}") ?>"><?= Html::encode($category->label) ?></a></td>
                <td><?= Html::encode($category->description) ?></td>
                <td>
                    <?= Html::a(Html::tag('i', '', ['class' => 'fas fa-pencil-alt']) . ' Edit', [
                        'update', 'id' => Html::encode($category->id)], ['class' => 'btn btn-primary btn-sm']) ?>
                    <?= Html::a(Html::tag('i', '', ['class' => 'fas fa-trash-alt']) . ' Delete', [
                        'delete', 'id' => Html::encode($category->id)], [
                        'class' => 'btn btn-danger btn-sm',
                        'data' => [
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
                <a href="<?= Url::to('categories/create') ?>" class="btn btn-primary btn-sm">New category</a>
            </td>
        </tr>
        </tfoot>
    </table>
</div>