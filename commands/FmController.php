<?php

namespace app\commands;

use yii\console\Controller;

class FmController extends Controller
{
    public function actionDirCreate($name)
    {
        echo $name . " created";
    }

    public function actionDirRemove($name)
    {
        echo $name . " removed";
    }

    public function actionDirRename($name)
    {
        echo $name . " renamed";
    }
}
