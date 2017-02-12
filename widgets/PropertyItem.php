<?php
namespace app\widgets;

use yii\base\Widget;

class PropertyItem extends Widget
{
    public $col;
    public $id;
    public $cover;
    public $name;
    public $region;
    public $location;
    public $price;
    public $bedroom;
    public $bathroom;
    public $url;

    public function run()
    {
        return $this->render('propertyItem', [
            'item' => $this
        ]);
    }
}