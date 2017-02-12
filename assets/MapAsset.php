<?php

namespace app\assets;

use Yii;
use yii\web\AssetBundle;

class MapAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init()
    {
        parent::init();

        $this->js[] = '//maps.googleapis.com/maps/api/js?key=' . Yii::$app->params['googleMapKey'];
        $this->js[] = '/js/gapi.js';
    }
}
