<?php
/* @var $this yii\web\View */
use app\helpers\ImageHelper;
use app\widgets\PropertyItem;
use yii\helpers\Url;

/* @var $model app\models\Offer */
?>

<section class="wrapper-md post">
    <div class="container">
        <h1><?= Yii::t('app', 'Offer') ?> - <span class="text-uppercase"><?= $model->code ?></span></h1>
        <p><?= nl2br($model->text) ?></p>

        <?php
        if ($model->name) {
            echo '<p>' . $model->name . '</p>';
        }
        if ($model->phone1) {
            echo '<p>' . $model->phone1 . '</p>';
        }
        if ($model->phone2) {
            echo '<p>' . $model->phone2 . '</p>';
        }
        if ($model->email) {
            echo '<p>' . $model->email . '</p>';
        }
        ?>

        <hr>

        <div class="row">
            <?php
                foreach ($model->properties as $item) {
                    echo PropertyItem::widget([
                        'col' => 'col-sm-6 col-md-3',
                        'id' => $item->id,
                        'url' => Url::toRoute(['property/index', 'id' => $item->id]),
                        'cover' => ImageHelper::normal($item->image_ids[0]),
                        'name' => $item->name,
                        'region' => $item->region->name,
                        'location' => $item->location->name,
                        'price' => $item->price,
                        'bedroom' => $item->bedroom,
                        'bathroom' => $item->bathroom
                    ]);
                }
            ?>
        </div>
    </div>
</section>