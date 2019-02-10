<?php

use yii\helpers\Html;
use \yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $article app\models\Article */

$this->title = 'Create Article';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <h1 class="py-4"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'article' => $article,
        'categories' => ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'label'),
    ]) ?>
</div>