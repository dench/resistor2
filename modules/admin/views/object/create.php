<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Object */
/* @var $images app\models\Image */

$this->title = Yii::t('app', 'Create Object');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Objects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'images' => $images,
]) ?>
