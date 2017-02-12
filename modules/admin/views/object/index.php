<?php

use app\models\Location;
use app\models\Region;
use app\models\ObjectStatus;
use app\modules\admin\widgets\Box;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ObjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Objects');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php Box::begin([
    'footer' => '
<div class="row">
    <div class="col-xs-8">' . Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) . '</div>
    <div class="col-xs-4">
        <div class="input-group">
            ' . Html::dropDownList('checkbox', null, [
                    
                ], ['class' => 'form-control', 'prompt' => '']) . '
            <span class="input-group-btn">
            <button class="btn btn-primary" type="button">' . Yii::t('app', 'OK') . '</button>
            </span>
        </div>
    </div>
</div>
',
]); ?>
<div class=" table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover',
        ],
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'headerOptions' => ['width' => '30'],
            ],
            [
                'attribute' => 'code',
                'headerOptions' => ['width' => '100'],
            ],
            'name',
            [
                'attribute' => 'properties',
                'content' => function($data){
                    return Html::a($data->countProperty, ['property/index', 'PropertySearch[object_id]' => $data->id]);
                },
                'headerOptions' => ['width' => '50'],
            ],
            [
                'attribute' => 'region_id',
                'filter' => Region::getList(),
                'value' => 'region.name',
            ],
            [
                'attribute' => 'location_id',
                'filter' => Location::getList(),
                'value' => 'location.name',
            ],
            'created_at:date',
            [
                'attribute' => 'status_id',
                'filter' => ObjectStatus::getList(),
                'value' => 'status.name',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '70'],
            ],
        ],
    ]); ?>
</div>
<?php Box::end(); ?>
