<?php

use app\models\RequestStatus;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'mycity')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'rooms')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'distance')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'sqr')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'budget')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'status_id')->dropDownList(RequestStatus::getList()) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
