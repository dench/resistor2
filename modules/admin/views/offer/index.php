<?php

use app\models\OfferStatus;
use app\modules\admin\widgets\Box;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OfferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Offers');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php Box::begin([
    'footer' => Html::a(Yii::t('app', 'Create offer'), ['create'], ['class' => 'btn btn-success'])
]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'code',
            'name',
            'phone1',
            'phone2',
            'email:email',
            'created_at:date',
            [
                'attribute' => 'status_id',
                'filter' => OfferStatus::getList(),
                'value' => 'status.name',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            Url::to(['/offer/index', 'code' => $model->code]),
                            [
                                'target' => '_blank'
                            ]
                        );
                    }
                ],
            ],
        ],
    ]); ?>

<?php Box::end(); ?>
