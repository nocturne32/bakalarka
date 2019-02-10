<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $article app\models\Article */
/* @var $categories array */
/* @var $form yii\widgets\ActiveForm */

?>


<?php $form = ActiveForm::begin([
    'options' => ['class' => 'mt-4 mb-4']
]); ?>


<?= $form->field($article, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Some title']) ?>
<?= $form->field($article, 'category_id')->dropDownList($categories) ?>
<?= $form->field($article, 'content')->textarea(['rows' => 3, 'placeholder' => 'Some text']) ?>
<?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-sm']) ?>

<?= $form->field($article, 'created_at')->hiddenInput(['value' => (new DateTimeImmutable('now'))->format('Y-m-d H:i:s')]) ?>
<?= $form->field($article, 'user_id')->hiddenInput(['value' => Yii::$app->user->id]) ?>

<?php ActiveForm::end(); ?>
