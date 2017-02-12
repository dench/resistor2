<?php

use app\models\Object;
use app\models\PropertyStatus;
use app\models\PropertySold;
use app\modules\admin\widgets\Box;
use app\widgets\YesOrNo;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Property */
/* @var $form yii\widgets\ActiveForm */
/* @var $images app\models\Image */

$urlPjax = Url::to(['pjax' => 1]);

$js = <<<JS
$('#property-object_id').change(function(){
    if ($(this).val()) {
        $.pjax.reload({container: "#object-pjax", timeout: 2000, url: '{$urlPjax}&object_id=' + $(this).val() });
    }
});
$(document).on('pjax:complete', function() {
    initMap();
});
JS;


$this->registerJs($js);
?>

<?php $form = ActiveForm::begin(); ?>

<?php Box::begin(['title' => Yii::t('app', 'Property info')]); ?>
<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="row">
            <div class="col-lg-12">
            <?php
            echo $form->field($model, 'object_id')->widget(Select2::className(), [
                'data' => Object::getList(),
                'theme' => Select2::THEME_DEFAULT,
                'options' => [
                    'placeholder' => Yii::t('app', 'New object'),
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
                'disabled' => $model->id ? true : false,
            ]);
            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                <?= $form->field($model, 'price')->widget(MaskedInput::className(), [
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => '.',
                        'autoGroup' => true,
                        'rightAlign' => false
                    ],
                    'options' => ['maxlength' => true, 'class' => 'form-control']
                ]) ?>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                <?= $form->field($model, 'commission')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                <?= $form->field($model, 'titul')->widget(YesOrNo::className()) ?>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                <?= $form->field($model, 'vat')->widget(YesOrNo::className()) ?>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                <?= $form->field($model, 'sold_id')->dropDownList(PropertySold::getList()) ?>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6">
                <?= $form->field($model, 'status_id')->dropDownList(PropertyStatus::getList()) ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <?= $form->field($model, 'contacts_owner')->textarea(['rows' => 3]) ?>
        <?= $form->field($model, 'contacts')->textarea(['rows' => 3]) ?>
    </div>
    <div class="col-md-6 col-lg-4">
        <?= $form->field($model, 'note_agent')->textarea(['rows' => 3]) ?>
        <?= $form->field($model, 'top')->checkbox() ?>
    </div>
</div>
<?php Box::end(); ?>

<?php Pjax::begin(['id' => 'object-pjax']) ?>
    <?= $this->render('@app/modules/admin/views/object/_common_form', [
        'model' => $model,
        'images' => $images,
        'form' => $form,
    ]) ?>
<?php Pjax::end() ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-lg btn-success' : 'btn btn-lg btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
