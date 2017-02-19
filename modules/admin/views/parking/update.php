<?php

use app\modules\admin\widgets\Box;

/* @var $this yii\web\View */
/* @var $model app\models\Parking */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Parking',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parkings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?php Box::begin(); ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

<?php Box::end(); ?>
