<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Object */
/* @var $form yii\widgets\ActiveForm */
/* @var $images app\models\Image */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $this->render('_common_form', [
    'model' => $model,
    'images' => $images,
    'form' => $form,
]) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-lg btn-success' : 'btn btn-lg btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
