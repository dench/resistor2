<?php

use app\models\Language;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */

$js = <<<JS
$('#page-name, #page-title').each(function(){
    $(this).attr('data-old', $(this).val());
});
$('#page-name').change(function(){
    var obj = $(this);
    $('input[id^="page-name_"]').each(function(){
        if (!$(this).val().length || $(this).val() == obj.attr('data-old')) {
            $(this).val(obj.val()).attr('data-old', obj.val());
        }
    });
    var obj2 = $('#page-title');
    if (!obj2.val().length || obj2.val() == obj.attr('data-old')) {
        obj2.val(obj.val()).change();
    }
    obj.attr('data-old', obj.val());
});
$('#page-title').change(function(){
    var obj = $(this);
    $('input[id^="page-title_"]').each(function(){
        if (!$(this).val().length || $(this).val() == obj.attr('data-old')) {
            $(this).val(obj.val()).attr('data-old', obj.val());
        }
    });
    obj.attr('data-old', obj.val());
});
JS;

$this->registerJs($js);
?>

<?php $form = ActiveForm::begin(); ?>

<ul class="nav nav-tabs">
    <?php foreach (Language::suffixList() as $suffix => $name) : ?>
        <li class="nav-item<?= empty($suffix) ? ' active': '' ?>"><a href="#lang<?= $suffix ?>" class="nav-link" data-toggle="tab"><?= $name ?></a></li>
    <?php endforeach; ?>
</ul>

<div class="tab-content">
    <?php foreach (Language::suffixList() as $suffix => $name) : ?>
        <div class="tab-pane fade<?php if (empty($suffix)) echo ' in active'; ?>" id="lang<?= $suffix ?>">
            <?= $form->field($model, 'name' . $suffix)->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'title' . $suffix)->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'keywords' . $suffix)->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description' . $suffix)->textarea() ?>
            <?= $form->field($model, 'text' . $suffix)->widget(CKEditor::className(), [
                'preset' => 'full',
                'clientOptions' => [
                    'customConfig' => '/js/ckeditor.js',
                    'language' => Yii::$app->language,
                    'allowedContent' => true,
                ]
            ]) ?>
        </div>
    <?php endforeach; ?>
    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'enabled')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

