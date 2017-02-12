<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Lang;
use app\widgets\Alert;
use app\assets\AppAssetIE9;
use app\assets\BootstrapSelect;
use app\assets\FontAwesomeAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
AppAssetIE9::register($this);
BootstrapSelect::register($this);
FontAwesomeAsset::register($this);

$script = <<< JS
    $('#modal-send-btn, #modal-btn').on('click', function(e) {
        e.preventDefault();
        $('#modal-send').modal('show')
            .find('#modal-send-content')
            .load($(this).attr('data-target'));
    });
JS;
Yii::$app->view->registerJs($script, yii\web\View::POS_READY);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<div id="wrap">
    <?php $this->beginBody() ?>

    <section id="top" class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-5 text-nowrap">
                    <?php
                    if (Yii::$app->params['phone1']) {
                        echo '<span class="top-pd top-pd-none"><i class="fa fa-phone"></i> '.Yii::$app->params['phone1'].'</span>';
                    }
                    if (Yii::$app->params['phone2']) {
                        echo '<span class="top-pd hidden-xs"><i class="fa fa-phone"></i> '.Yii::$app->params['phone2'].'</span>';
                    }
                    if (Yii::$app->params['email']) {
                        echo '<a href="mailto:'.Yii::$app->params['email'].'" class="top-pd hidden-xs hidden-sm hidden-md"><i class="fa fa-envelope fa-fw"></i> '.Yii::$app->params['email'].'</a>';
                    }
                    ?>
                </div>
                <div class="col-xs-3 col-sm-4 col-md-5 text-right top-pd-sx text-nowrap">
                    <?php
                    echo Html::a('<i class="fa fa-search fa-fw"></i> <span class="hidden-xs hidden-sm">'.Yii::t('app', 'Property search request').'</span><span class="hidden-xs hidden-md hidden-lg">'.Yii::t('app', 'Search').'</span>', '#', ['id' => 'modal-send-btn','class' => 'top-pd', 'data-target' => Url::to(['site/send'])]);
                    ?>
                </div>
                <div class="col-xs-3 col-sm-2 col-md-2">
                    <?= Lang::widget() ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/palalini.jpg', ['alt' => Yii::$app->params['sitename'], 'height' => '100%']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-static-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('app', 'Home'), 'url' => ['/'], 'active' => (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index')],
        ['label' => Yii::t('app', 'Property search'), 'url' => ['/search'], 'active' => Yii::$app->controller->id == 'search'],
        ['label' => Yii::t('app', 'Agents to'), 'url' => ['/site/agent']],
        ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
        ['label' => Yii::t('app', 'Contacts'), 'url' => ['/site/contacts']],
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <?= Alert::widget() ?>

    <?= $content ?>
</div>
<footer class="footer-container">
    <section class="footer-secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="copy">
                        <?= Yii::t('app', 'All Rights Reserved') ?> ® <a href="#" target="_blank"><?= Yii::$app->params['sitename'] ?></a>
                    </div>
                </div>
                <div class="col-sm-4 text-right">
                    <ul class="social-networks">
                        <li><a class="btn btn-twitter" href="#"><i class="fa fa-fw fa-twitter"></i></a></li>
                        <li><a class="btn btn-facebook" href="#"><i class="fa fa-fw fa-facebook"></i></a></li>
                        <li><a class="btn btn-google-plus" href="#"><i class="fa fa-fw fa-google-plus"></i></a></li>
                        <li><a class="btn btn-pinterest" href="#"><i class="fa fa-fw fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</footer>

<?php
yii\bootstrap\Modal::begin([
    'header' => '<h2>' . Yii::t('app', 'Property search request') . '</h2>',
    'id' => 'modal-send',
]);
?>
<div id='modal-send-content'></div>
<?php yii\bootstrap\Modal::end(); ?>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-85595142-1', 'auto');
    ga('send', 'pageview');
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>