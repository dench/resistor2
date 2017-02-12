<?php
/**
 * Created by PhpStorm.
 * User: Dench
 * Date: 21.01.2017
 * Time: 19:26
 */

namespace app\widgets;

use Yii;
use yii\helpers\Html;
use yii\widgets\InputWidget;

class YesOrNo extends InputWidget
{
    public $options = ['class' => 'form-control', 'prompt' => ''];
    
    public $items;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->items = [
            0 => Yii::t('app', 'No'),
            1 => Yii::t('app', 'Yes'),
        ];
        if ($this->hasModel()) {
            echo Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
        } else {
            echo Html::dropDownList($this->name, $this->value, $this->items, $this->options);
        }
    }
}