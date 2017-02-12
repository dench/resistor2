<?php

namespace app\controllers;

use app\models\Image;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ImageController extends Controller
{
    public function actionPhoto($id, $size)
    {
        if ($file = Image::resize($id, $size)) {
            header('Content-Type: image/jpeg');
            print file_get_contents($file);
        } else {
            throw new NotFoundHttpException('Photo not found!');
        }
        die();
    }

}
