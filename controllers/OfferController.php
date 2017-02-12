<?php

namespace app\controllers;

use app\models\Offer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class OfferController extends Controller
{
    public function actionIndex($code)
    {
        $model = $this->findModel($code);
        
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Offer model based on its code value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $code
     * @return Offer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($code)
    {
        if (($model = Offer::findOne(['code' => $code])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
