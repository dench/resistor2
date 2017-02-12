<?php

namespace app\controllers;

use app\models\Property;
use Yii;
use yii\web\NotFoundHttpException;

class PropertyController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $model = Property::findOne($id);

        if (!$model || $model->status != 1) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }

}
