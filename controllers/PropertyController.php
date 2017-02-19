<?php

namespace app\controllers;

use app\models\Offer;
use app\models\Property;
use Yii;
use yii\web\NotFoundHttpException;

class PropertyController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $model = Property::findOne($id);

        if (!$model || $model->status_id != 1) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionOffer($code, $id)
    {
        $model = Offer::findOne(['code' => $code]);

        if (!$model || $model->status_id != 1) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        $model = Property::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }

}
