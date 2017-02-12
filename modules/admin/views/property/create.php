<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Property */
/* @var $images app\models\Image */

$this->title = Yii::t('app', 'Create Property');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'images' => $images,
]) ?>
