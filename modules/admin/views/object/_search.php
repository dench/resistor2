<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ObjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'year') ?>

    <?= $form->field($model, 'region_id') ?>

    <?php // echo $form->field($model, 'location_id') ?>

    <?php // echo $form->field($model, 'coordinates') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'covered') ?>

    <?php // echo $form->field($model, 'uncovered') ?>

    <?php // echo $form->field($model, 'plot') ?>

    <?php // echo $form->field($model, 'bathroom') ?>

    <?php // echo $form->field($model, 'bedroom') ?>

    <?php // echo $form->field($model, 'parking_id') ?>

    <?php // echo $form->field($model, 'solarpanel') ?>

    <?php // echo $form->field($model, 'sauna') ?>

    <?php // echo $form->field($model, 'furniture') ?>

    <?php // echo $form->field($model, 'conditioner') ?>

    <?php // echo $form->field($model, 'heating') ?>

    <?php // echo $form->field($model, 'pantry') ?>

    <?php // echo $form->field($model, 'tennis') ?>

    <?php // echo $form->field($model, 'pool') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
