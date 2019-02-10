<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $article app\models\Article */
/* @var $categories array */
/* @var $form yii\widgets\ActiveForm */

?>


<?php $form = ActiveForm::begin(); ?>

<?= $form->field($article, 'user_id')->hiddenInput(['value' => Yii::$app->user->id]) ?>

<?= $form->field($article, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Some title']) ?>
<?= $form->field($article, 'category_id')->dropDownList($categories) ?>
<?= $form->field($article, 'content')->textarea(['rows' => 3, 'placeholder' => 'Some text']) ?>

<?= $form->field($article, 'created_at')->hiddenInput(['value' => (new DateTimeImmutable('now'))->format('Y-m-d H:i:s')]) ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-sm']) ?>
</div>

<?php ActiveForm::end(); ?>
