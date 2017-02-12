<?php

use app\helpers\ImageHelper;
use app\models\Property;
use app\modules\admin\widgets\Box;
use app\modules\admin\widgets\PropertyItem;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Offer */
/* @var $form yii\widgets\ActiveForm */
/* @var $properties app\models\Property[] */

$urlPjax = Url::to([0 => null, 'id' => Yii::$app->request->get('id')]);

$js = <<<JS
$(document).on('click', '#property_add', function() {
    var obj = $('#property_add_id');
    if (obj.val()) {
        var id = obj.val();
        var ids = removeId(id, parseUrl('property_ids'));
        if (ids) ids += ',';
        ids += id;
        reloadPjax(ids);
    }
});

$(document).on('click', '.item-delete', function() {
    var id = $(this).parents('.thumbnail').attr('id').replace('i','');
    var ids = removeId(id, parseUrl('property_ids'));
    reloadPjax(ids);
});

function reloadPjax(ids) {
    var url = '{$urlPjax}';
    ids = 'property_ids=' + ids;
    if (url.indexOf('?') + 1) {
        url += '&';
    } else {
        url += '?';
    }
$.pjax.reload({container: "#properties-pjax", timeout: 2000, url: url + ids });
}

function removeId(id, ids) {
    ids = (','+ids+',').replace(','+id+',',',');
    ids = ('|'+ids+'|').replace('|,','').replace(',|','').replace('|','');
    return ids;
}

function parseUrl(name) {
    var url = window.location.href;
    var ids = '';
    if (url.indexOf(name + '=') + 1) {
        var url2 = url.split(name + '=');
        if (url2[1]) {
            if (url2[1].indexOf('admin')+1) {} else {
                ids = url2[1];
            }
        } else {
            ids = inputIds();
        }
    } else {
        ids = inputIds();
    }
    return ids;
}

function inputIds() {
    var ids = [];
    $('#properties-pjax input').each(function(){
        ids.push($(this).val());
    });
    return ids.join(',');
}

function unique(a) {
    a.sort();
    for (var i = a.length - 1; i > 0; i--) {
        if (a[i] == a[i - 1]) a.splice( i, 1);
    }
    return a;
}
JS;


$this->registerJs($js);
?>

<?php $form = ActiveForm::begin(); ?>

<?php Box::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <?= $form->field($model, 'phone1')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6 col-xs-6">
                    <?= $form->field($model, 'phone2')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

<?php Box::end(); ?>

<?php Pjax::begin(['id' => 'properties-pjax']) ?>

<?php
echo Select2::widget([
    'id' => 'property_add_id',
    'name' => 'property_add_id',
    'data' => Property::getList(),
    'theme' => Select2::THEME_DEFAULT,
    'options' => [
        'placeholder' => Yii::t('app', 'Select property...'),
    ],
    'pluginOptions' => [
        'allowClear' => true,
    ],
    'addon' => [
        'append' => [
            'content' => Html::button(Yii::t('app', 'Add'), [
                'class' => 'btn btn-primary',
                'id' => 'property_add',
            ]),
            'asButton' => true
        ],
    ],

]);
?>

<hr>

<div class="row">
    <?php
    foreach ($properties as $n => $item) {
        echo PropertyItem::widget([
            'col' => 'col-sm-6 col-md-3',
            'id' => $item->id,
            'url' => Url::toRoute(['property/update', 'id' => $item->id]),
            'cover' => ImageHelper::normal($item->image_ids[0]),
            'name' => $item->name,
            'region' => $item->region->name,
            'location' => $item->location->name,
            'price' => $item->price,
            'bedroom' => $item->bedroom,
            'bathroom' => $item->bathroom
        ]);

        echo Html::hiddenInput('Offer[property_ids][]', $item->id);

        if (($n+1) % 4 == 0) {
            echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
        }
        if (($n+1) % 2 == 0) {
            echo '<div class="clearfix visible-sm-block"></div>';
        }
    }
    ?>
</div>

<?php Pjax::end() ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-lg btn-success' : 'btn btn-lg btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

