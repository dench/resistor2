<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'About Cyprus');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="wrapper-lg bg-highlight">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="widget padding-lg bg-primary">
                    <p class="lead">Quick: do you have a intuitive strategy for handling new architectures?</p>
                </div>
            </div><!-- /.col -->
            <div class="col-sm-12 col-md-8">
                <h2>That's who <span class="text-info">we are</span></h2>
                <p class="lead">If you innovate transparently, you may have to upgrade intuitively.</p>
                <p>We believe we know that if you incentivize intuitively then you may also optimize interactively. If all of this may seem misleading to you, that's because it is! We will utilize the term "proactive". We think that most C2C2C portals use far too much ActionScript, and not enough SVG. Quick: do you have a 24/7/365 game plan for handling unplanned-for action-items?</p>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

<section class="wrapper-lg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2>Get to kow <span class="text-muted">Our process</span></h2>
                <p>Graphikaria is the industry leader of e-business metrics. We will reinvent the buzzword "real-world". Without appropriate visionary, out-of-the-box research and development, distributed web-readiness are forced to become out-of-the-box, extensible. What do we redefine? Anything and everything, regardless of obscureness! The metrics for next-generation mission-critical, real-world implementation are more well-understood if they are not 60/24/7/365. We always drive innovative relationships.</p>
                <h2>We can do it</h2>
                <p class="lead">We're here to help you succeed</p>
            </div><!-- /.col -->
            <div class="col-sm-12 col-md-6">
                <p class="lead">Methodology:</p>
                <div class="progress progress-striped">
                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <span class="sr-only">0.00% Complete</span>
                    </div>
                </div><!-- /.progress -->
                <p class="lead">Processes:</p>
                <div class="progress progress-striped">
                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                        <span class="sr-only">0.00% Complete</span>
                    </div>
                </div><!-- /.progress -->
                <p class="lead">Progress:</p>
                <div class="progress progress-striped">
                    <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <span class="sr-only">0.00% Complete</span>
                    </div>
                </div><!-- /.progress -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

<section class="wrapper-md bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="widget padding-md text-center bg-light">
                    <h3 class="heading-default"><i class="fa fa-bell"></i> Popularity</h3>
                    <p>We here at Graphikaria believe we know that it is better to cultivate iteravely than to grow compellingly.</p>
                </div><!-- /.widget -->
            </div><!-- /.col -->
            <div class="col-sm-12 col-md-4">
                <div class="widget padding-md text-center bg-light">
                    <h3 class="heading-default"><i class="fa fa-certificate"></i> Success</h3>
                    <p>We here at Graphikaria believe we know that it is better to cultivate iteravely than to grow compellingly.</p>
                </div><!-- /.widget -->
            </div><!-- /.col -->
            <div class="col-sm-12 col-md-4">
                <div class="widget padding-md text-center bg-light">
                    <h3 class="heading-default"><i class="fa fa-anchor"></i> Reliability</h3>
                    <p>We here at Graphikaria believe we know that it is better to cultivate iteravely than to grow compellingly.</p>
                </div><!-- /.widget -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

<section class="wrapper-lg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
                <h2>Have you ever been unable to drive your feature set?</h2>
                <p class="lead">We think that most transparent splash pages use far too much XHTML, and not enough Unix.</p>
                <div class="input-group">
                    <input type="text" class="form-control input-lg" placeholder="Your email">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-lg" tabindex="-1">Subscribe</button>
                    </div>
                </div><!-- /.input-group -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

<section class="wrapper-md">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>This is the About page. You may modify the following file to customize its content:</p>

        <code><?= __FILE__ ?></code>

        <?php if (empty(Yii::$app->user->identity->group_id)): ?>
            <h1>Guest</h1>
        <?php endif ?>

        <?php if (@Yii::$app->user->identity->group_id == 1): ?>
            <h1>Admin</h1>
        <?php endif ?>

        <?php if (@Yii::$app->user->identity->group_id > 0): ?>
            <h1>User</h1>
        <?php endif ?>

    </div>
</section>
<?php
$temp = \common\models\SourceMessage::find()->all();

foreach ($temp as $t) {
    if ($t->message == $t->contents[0]->translation) {
        echo "<br>";
        echo "'".$t->message."'";
        echo " => ";
        echo "'".$t->contents[1]->translation."',";
    }
}
echo "<br>";
echo "_______________";
foreach ($temp as $t) {
    if ($t->message != $t->contents[0]->translation) {
        echo "<br>";
        echo "'".$t->message."'";
        echo " => ";
        echo "'".$t->contents[1]->translation."',";
    }
}
/*$geo = new \jisoft\sypexgeo\Sypexgeo();

// get by remote IP
$geo->get();                // also returned geo data as array
echo $geo->ip,'<br>';
echo $geo->ipAsLong,'<br>';
var_dump($geo->country); echo '<br>';
var_dump($geo->region);  echo '<br>';
var_dump($geo->city);    echo '<br>';

$data = \common\models\District::find()->orderBy('region_id')->all();

$items = [];

foreach ($data as $d) {
    $en = \common\models\DistrictLang::findOne(['id' => $d->id, 'lang_id' => 1]);
    $items[] = [
        $d->region_id => $en->name,
    ];
}

echo "<pre>";
echo var_export54($items);
echo "</pre>";

function var_export54($var, $indent="") {
    switch (gettype($var)) {
        case "string":
            return "'" . addcslashes($var, "\\\$\"\r\n\t\v\f") . "'";
        case "array":
            $indexed = array_keys($var) === range(0, count($var) - 1);
            $r = [];
            foreach ($var as $key => $value) {
                $r[] = "$indent"
                    . ($indexed ? "" : var_export54($key) . " => ")
                    . var_export54($value, "$indent");
            }
            return "[" . implode(",\n", $r) . "" . $indent . "]";
        case "boolean":
            return $var ? "TRUE" : "FALSE";
        default:
            return var_export($var, TRUE);
    }
}*/
?>
