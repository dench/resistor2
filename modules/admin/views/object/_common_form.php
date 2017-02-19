<?php

use app\helpers\ImageHelper;
use app\models\Language;
use app\models\Location;
use app\models\Near;
use app\models\Parking;
use app\models\Type;
use app\models\Region;
use app\models\Stage;
use app\models\ObjectStatus;
use app\models\View;
use app\modules\admin\widgets\Box;
use app\widgets\YesOrNo;
use app\assets\MapAsset;
use kartik\depdrop\DepDrop;
use kartik\file\FileInput;
use yii\helpers\Url;

MapAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Object|app\models\Property */
/* @var $form yii\widgets\ActiveForm */
/* @var $images app\models\Image */
?>

<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="row">
            <div class="col-lg-12">
                <?php Box::begin(['title' => Yii::t('app', 'General info')]); ?>
                <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                    <?= $form->field($model, 'name' . $suffix)->textInput(['maxlength' => true]) ?>
                <?php endforeach; ?>
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'covered')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'uncovered')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'plot')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'type_id')->dropDownList(Type::getList(), ['prompt' => '']) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'bathroom')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'bedroom')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'stage_id')->dropDownList(Stage::getList(), ['prompt' => '']) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?php
                        if ($model->formName() == 'Object') {
                            echo $form->field($model, 'status_id')->dropDownList(ObjectStatus::getList());
                        }
                        ?>
                    </div>
                </div>
                <?php Box::end(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <?php Box::begin(['title' => Yii::t('app', 'Location')]); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'region_id')->dropDownList(Region::getList(), ['prompt' => '', 'id' => 'region_id']) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'location_id')->widget(DepDrop::className(), [
                            'data' => Location::getList($model->region_id),
                            'options' => ['id' => 'location_id'],
                            'pluginOptions'=>[
                                'depends' => ['region_id'],
                                'placeholder' => false,
                                'url' => Url::to(['/ajax/location-list'])
                            ]
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'address', ['template' => "{label}\n<div class=\"input-group\">{input}\n<span class=\"input-group-btn\"><button class=\"btn btn-default\" type=\"button\"><span class=\"glyphicon glyphicon-refresh\" aria-hidden=\"true\"></span></button></span></div>\n{hint}\n{error}"])->textInput(['maxlength' => true, 'id' => 'address']) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'coordinates', ['template' => "{label}\n<div class=\"input-group\">{input}\n<span class=\"input-group-btn\"><button class=\"btn btn-default\" type=\"button\"><span class=\"glyphicon glyphicon-refresh\" aria-hidden=\"true\"></span></button></span></div>\n{hint}\n{error}"])->textInput(['maxlength' => true, 'id' => 'coordinates']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="map_canvas" style="height: 300px; margin-bottom: 20px;"></div>
                    </div>
                </div>
                <?php Box::end(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <?php Box::begin(['title' => Yii::t('app', 'Description (see all)')]); ?>
                <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                    <?= $form->field($model, 'text' . $suffix)->textarea(['rows' => 6]) ?>
                <?php endforeach; ?>
                <?= $form->field($model, 'note_admin')->textarea(['rows' => 6]) ?>
                <?php Box::end(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <?php Box::begin(['title' => Yii::t('app', 'Extra')]); ?>
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'sauna')->widget(YesOrNo::className()) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'furniture')->widget(YesOrNo::className()) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'conditioner')->widget(YesOrNo::className()) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'parking_id')->dropDownList(Parking::getList(), ['prompt' => '']) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'heating')->widget(YesOrNo::className()) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'pantry')->widget(YesOrNo::className()) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'pool')->widget(YesOrNo::className()) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'tennis')->widget(YesOrNo::className()) ?>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                        <?= $form->field($model, 'solarpanel')->widget(YesOrNo::className()) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-12">
                        <?= $form->field($model, 'view_ids')->checkboxList(View::getList()) ?>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <?= $form->field($model, 'near_ids')->checkboxList(Near::getList()) ?>
                    </div>
                </div>
                <?php Box::end(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <?php Box::begin(['title' => Yii::t('app', 'Photos')]); ?>
        <?php

        $fileInputName = 'files';
        $modelInputName = $model->formName() . '[image_ids][]';

        $initialPreview = [];
        $initialPreviewConfig = [];
        foreach ($images as $image) {
            $initialPreview[] = '<img src="' . ImageHelper::size($image->id, 'small') . '" alt="" width="100%"><input type="hidden" name="' . $modelInputName . '" value="' . $image->id . '">';
            $initialPreviewConfig[] = [
                'url' => Url::to(['/ajax/file-hide']),
                'key' => $image->file_id,
            ];
        }

        echo FileInput::widget([
            'id' => $fileInputName,
            'name' => $fileInputName.'[]',
            'options' => [
                'multiple' => true,
                'accept' => 'image/jpeg'
            ],
            'language' => Yii::$app->language,
            'pluginOptions' => [
                'initialPreview' => $initialPreview,
                'initialPreviewConfig' => $initialPreviewConfig,
                'fileActionSettings' => [
                    'showZoom' => false,
                    'dragClass' => 'btn btn-xs btn-default',
                ],
                'previewFileType' => 'image',
                'uploadUrl' => Url::to(['/ajax/file-upload']),
                'uploadExtraData' => [
                    'name' => $modelInputName,
                ],
                'uploadAsync' => false,
                'showUpload' => false,
                'showRemove' => false,
                'showBrowse' => true,
                'showCaption' => false,
                'showClose' => false,
                'showPreview ' => false,
                'dropZoneEnabled' => false,
                'layoutTemplates' => [
                    'modalMain' => '',
                    'modal' => '',
                    'footer' => '<div class="file-thumbnail-footer">{actions}</div>',
                    'actions' => '{delete}',
                    'progress' => '',
                ],
                'previewTemplates' => [
                    'generic' => '
<div class="col-lg-6 col-md-4 col-sm-4 col-xs-6 file-sortable">
    <div class="file-preview-frame kv-preview-thumb file-drag-handle drag-handle-init" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">
        <div class="kv-file-content">
            {content}
         </div>
        {footer}
    </div>
</div>',
                    'image' => '
<div class="col-lg-6 col-md-4 col-sm-4 col-xs-6">
    <div class="file-preview-frame kv-preview-thumb" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">
        <div class="kv-file-content">
            <img src="{data}" class="kv-preview-data file-preview-image" title="{caption}" alt="{caption}" width="100%">
        </div>
        {footer}
    </div>
</div>',
                ],
            ],
            'pluginEvents' => [
                'filebatchselected' => 'function(event, files) { $("#' . $fileInputName . '").fileinput("upload"); }',
            ],
        ]);
        ?>
        <?php Box::end(); ?>
    </div>
</div>