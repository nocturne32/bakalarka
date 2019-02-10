<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $category app\models\Category */

$this->title = 'Edit category';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $category->id, 'url' => ['view', 'id' => $category->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">
    <h1 class="py-4"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'category' => $category,
    ]) ?>

</div>
