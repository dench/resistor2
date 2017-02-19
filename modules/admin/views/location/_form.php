<?php

use app\models\Language;
use app\models\Region;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'region_id')->dropDownList(Region::getList()) ?>

<?php foreach (Language::suffixList() as $suffix => $name) : ?>
    <?= $form->field($model, 'name' . $suffix)->textInput(['maxlength' => true]) ?>
<?php endforeach; ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
