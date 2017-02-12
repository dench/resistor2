<?php
/**
 * Created by PhpStorm.
 * User: Dench
 * Date: 29.01.2017
 * Time: 12:15
 */

/** @var $model app\modules\admin\models\UploadFiles */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'files[]')->fileInput(['multiple' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Upload'), ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end() ?>