<?php

namespace app\controllers;

use app\helpers\ImageHelper;
use app\models\File;
use app\models\Location;
use app\models\Object;
use app\modules\admin\models\UploadFiles;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class AjaxController extends Controller
{
    public function actionLocationList()
    {
        /** @var array $result */
        if (Yii::$app->request->isAjax) {
            if ($parents = Yii::$app->request->post('depdrop_parents')) {

                $out = Location::getList($parents[0]);

                foreach ($out as $key => $value) {
                    $result[] = ['id' => $key, 'name' => $value];
                }


                return Json::encode(['output' => $result, 'selected' => '']);
            }
        }
        return false;
    }

    public function actionLocationMarkers($location_id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        // TODO: For admin
        if (Yii::$app->request->isAjax) {
            $temp = Object::getMarkers($location_id);
            return $temp;
        }
        return [];
    }
    
    public function actionFileUpload()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->request->isAjax) {

            $name = Yii::$app->request->post('name');

            $model = new UploadFiles();
            $model->files = UploadedFile::getInstancesByName('files');
            
            if ($model->upload()) {
                $initialPreview = [];
                $initialPreviewConfig = [];
                foreach ($model->upload as $upload) {
                    $initialPreview[] = '<img src="' . ImageHelper::size($upload['image']->id, 'small') . '" alt="" width="100%"><input type="hidden" name="' . $name . '" value="' . $upload['image']->id . '">';
                    $initialPreviewConfig[] = [
                        'url' => Url::to(['/ajax/file-delete']),
                        'key' => $upload['file']->id,
                    ];
                }
                return [
                    'initialPreview' => $initialPreview,
                    'initialPreviewConfig' => $initialPreviewConfig,
                ];
            }
        }
        return [
            'error' => 'Error!',
        ];
    }

    public function actionFileDelete()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        Yii::error('Dench');

        if (Yii::$app->request->isAjax) {
            if ($id = Yii::$app->request->post('key')) {
                $model = File::findOne($id);
                if ($model->delete()) {
                    return [];
                }
            }
        }
        return [
            'error' => 'Error!',
        ];
    }

    public function actionFileHide()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return [];
    }
}
