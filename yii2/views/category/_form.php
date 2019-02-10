<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $category app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin([
    'options' => ['class' => 'mt-4 mb-4']
]); ?>

<?= $form->field($category, 'label')->textInput(['maxlength' => true]) ?>

<?= $form->field($category, 'description')->textarea(['rows' => 3]) ?>

<?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-sm']) ?>

<?php ActiveForm::end(); ?>

