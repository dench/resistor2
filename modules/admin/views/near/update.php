<?php

use app\modules\admin\widgets\Box;

/* @var $this yii\web\View */
/* @var $model app\models\Near */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Near',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nears'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?php Box::begin(); ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

<?php Box::end(); ?>
