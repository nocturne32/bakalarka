<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */

$this->title = 'Sign up';
?>
<div class="container">
    <h1 class="py-4"><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'mt-4 mb-4']
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['placeholder' => 'example123', 'autofocus' => true]) ?>
    <?= $form->field($model, 'fullname')->textInput(['placeholder' => 'John Doe']) ?>
    <?= $form->field($model, 'email')->textInput(['placeholder' => 'example@example.com', 'type'=>'email']) ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => '*******']) ?>
    <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder' => '*******']) ?>

    <button type="submit" class="btn btn-primary btn-sm">Sign up</button>

    <?php ActiveForm::end(); ?>

</div>
