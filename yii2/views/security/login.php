<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $authenticator app\models\Authenticator */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Sign in';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1 class="py-4"><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'mt-4 mb-4']
    ]); ?>

    <?= $form->field($authenticator, 'username')->textInput(['placeholder' => 'example123','autofocus' => true]) ?>
    <?= $form->field($authenticator, 'password')->passwordInput(['placeholder' => '*******']) ?>

    <button type="submit" class="btn btn-primary btn-sm">Sign in</button>

    <?php ActiveForm::end(); ?>

</div>
