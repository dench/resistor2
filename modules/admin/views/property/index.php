<?php

use app\models\Location;
use app\models\Region;
use app\models\PropertyStatus;
use app\modules\admin\widgets\Box;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel \app\models\PropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Properties');
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
                'attribute' => 'top',
                'filter' => [0,1],
                'content' => function($data){
                    if ($data->top) {
                        return '<i class="fa fa-check"></i>';
                    } else {
                        return '';
                    }
                }
            ],
            [
                'attribute' => 'status_id',
                'filter' => PropertyStatus::getList(),
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
