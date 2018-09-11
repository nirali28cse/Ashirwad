
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\authclient\widgets\AuthChoice;
?>

<?php $form = ActiveForm::begin(['id'=>'registrationform']); ?>

<?= $form->field($model, 'username')->label(false)->textInput(['placeholder'=>'User Name','maxlength' => true]) ?>

<?= $form->field($model, 'email_id')->label(false)->textInput(['placeholder'=>'Email','maxlength' => true]) ?>

<?= $form->field($model, 'password')->label(false)->passwordInput(['placeholder'=>'Password','maxlength' => true]) ?>

<input type="submit" value="Sign Up" class="btn">

<?php ActiveForm::end(); ?>


