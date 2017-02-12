<?php

/* @var $this yii\web\View */
/* @var $search app\models\PropertySearch */
/* @var $last array */
/* @var $week array */
/* @var $searchModel app\models\PropertySearch */

use app\helpers\ImageHelper;
use app\widgets\PropertyItem;
use yii\helpers\Url;

$this->title = Yii::$app->params['sitename'];
?>

<section class="wrapper-lg bg-custom-home">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="widget padding-lg bg-dark home-block">
                    <h1 class="text-center text-light"><?= Yii::t('app', 'Buying property in Cyprus? We can help.') ?></h1>
                    <br class="spacer-lg">

                    <?= $this->render('../search/_search', ['model' => $searchModel]); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="wrapper-md">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2><i class="fa fa-trophy text-primary"></i> <?= $this->params['page']->name ?></h2>
                <?= $this->params['page']->text ?>
            </div>
        </div>
    </div>
</section>

<section class="wrapper-md bg-highlight">
    <div class="container">
        <div class="row">
            <?php
                foreach ($last as $item) {
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

<section class="wrapper-md bg-primary">
    <div class="container">
        <h2 class="text-center headline"><?= Yii::t('app', 'Featured this week') ?></h2>
        <br class="spacer-lg">
        <div class="row">
            <?php
                foreach ($week as $item) {
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

<section class="wrapper-md">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 text-center">
                <div class="widget padding-md bg-primary">
                    <h2><i class="fa fa-list"></i> <?= Yii::t('app', 'How to choose') ?></h2>
                    <p class="lead"><?= Yii::t('app', 'If you\'re still undecided - just trust us.') ?></p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 text-center">
                <div class="widget padding-md bg-info">
                    <h2><i class="fa fa-flag"></i> <?= Yii::t('app', 'Legal support') ?></h2>
                    <p class="lead"><?= Yii::t('app', 'We will remove from you all the headaches in legal matters, that would be all that you do - it\'s faster to enjoy Cyprus.') ?></p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 text-center">
                <div class="widget padding-md bg-primary">
                    <h2><i class="fa fa-question-circle"></i> <?= Yii::t('app', 'Service') ?></h2>
                    <p class="lead"><?= Yii::t('app', 'New life or a good investment? You will feel in Cyprus at home, we will take care!') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>