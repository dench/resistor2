<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Offer */

$this->title = Yii::t('app', 'Create Offer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Offers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'properties' => $properties,
]) ?>
