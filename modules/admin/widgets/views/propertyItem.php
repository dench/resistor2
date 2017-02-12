<?php
/** @var $item app\modules\admin\widgets\PropertyItem */

use yii\helpers\Html;

?>
<div class="<?= $item->col ?>">
    <div class="thumbnail" id="i<?= $item->id ?>">
        <a href="<?= $item->url ?>" target="_blank"><?= Html::img($item->cover, ['alt' => $item->name]); ?></a>
        <div class="caption">
            <p><a href="<?= $item->url ?>" target="_blank"><?= Html::encode($item->name) ?></a></p>
            <p><?= Html::encode($item->region) ?>, <?= Html::encode($item->location) ?></p>
            <p>
                <i class="fa fa-fw fa-info-circle"></i>
                <?php
                if ($item->bedroom) {
                    echo Yii::t('app', 'Bedrooms').": ".$item->bedroom;
                }
                if ($item->bathroom) {
                    echo " | ".Yii::t('app', 'Bath').": ".$item->bathroom;
                }
                ?>
            </p>
            <div>
                <span class="item-delete"><i class="fa fa-times"></i></span>
                <i class="fa fa-fw fa-eur"></i> <?= number_format($item->price, 0, '.', ',') ?>
            </div>
        </div>
    </div>
</div>