<?php

use app\helpers\ImageHelper;
use app\widgets\PropertyItem;
use yii\helpers\Url;

?>

<?php
    echo PropertyItem::widget([
        'col' => 'col-sm-6 col-md-3',
        'id' => $model->id,
        'url' => Url::toRoute(['property/index', 'id' => $model->id]),
        'cover' => ImageHelper::normal($model->image_ids[0]),
        'name' => $model->name,
        'region' => $model->region->name,
        'location' => $model->location->name,
        'price' => $model->price,
        'bedroom' => $model->bedroom,
        'bathroom' => $model->bathroom
    ]);
?>