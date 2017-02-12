<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Property */
/* @var $images app\models\Image */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Property',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?= $this->render('_form', [
    'model' => $model,
    'images' => $images,
]) ?>