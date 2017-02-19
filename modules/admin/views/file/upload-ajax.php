<?php
/**
 * Created by PhpStorm.
 * User: Dench
 * Date: 29.01.2017
 * Time: 15:06
 */

/** @var $model app\modules\admin\models\UploadFiles */

use kartik\file\FileInput;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<div class="row">
    <div class="col-lg-6 col-md-12">

        <?php $form = ActiveForm::begin() ?>

        <?php

        $fileInputName = 'files';

        echo FileInput::widget([
            'id' => $fileInputName,
            'name' => $fileInputName.'[]',
            'options' => [
                'multiple' => true,
            ],
            'language' => Yii::$app->language,
            'pluginOptions' => [
                'previewFileType' => 'image',
                'uploadUrl' => Url::to(['/ajax/file-upload']),
                'deleteUrl' => Url::to(['/ajax/file-delete']),
                'uploadAsync' => false,
                'showUpload' => false,
                'showRemove' => false,
                'showBrowse' => false,
                'browseOnZoneClick' => true,
                'showCaption' => false,
                'showClose' => false,
            ],
            'pluginEvents' => [
                'filebatchselected' => 'function(event, files) { $("#uploadfiles-files").fileinput("upload"); }',
            ],
        ]);
        ?>

        <?php ActiveForm::end() ?>

    </div>
</div>
