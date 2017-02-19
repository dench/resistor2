<?php

use app\components\SetColumn;
use app\models\User;
use app\models\Zone;
use app\modules\admin\widgets\Box;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
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
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'grid-view table-responsive'],
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['width' => '60'],
                'contentOptions' => ['class' => 'text-right'],
            ],
            'username',
            'email:email',
            [
                'class' => SetColumn::className(),
                'attribute' => 'status',
                'name' => 'statusName',
                'filter' => User::statusList(),
            ],
            'created_at:date',
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '70'],
            ],
        ],
    ]); ?>
</div>
<?php Box::end(); ?>