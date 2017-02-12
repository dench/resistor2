<?php
/**
 * Created by PhpStorm.
 * User: Dench
 * Date: 04.02.2017
 * Time: 20:32
 */

namespace app\models;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "property".
 *
 * @property integer $id
 * @property integer $object_id
 * @property integer $user_id
 * @property integer $status_id
 * @property integer $type_id
 * @property integer $year
 * @property integer $region_id
 * @property integer $location_id
 * @property string $coordinates
 * @property string $address
 * @property integer $covered
 * @property integer $uncovered
 * @property integer $plot
 * @property integer $bathroom
 * @property integer $bedroom
 * @property integer $parking_id
 * @property integer $solarpanel
 * @property integer $sauna
 * @property integer $furniture
 * @property integer $conditioner
 * @property integer $heating
 * @property integer $pantry
 * @property integer $tennis
 * @property integer $pool
 * @property integer $stage_id
 * @property string $note_admin
 * @property integer $top
 * @property integer $code
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $position
 *
 * @property integer $price
 * @property integer $vat
 * @property integer $commission
 * @property integer $titul
 * @property integer $note_agent
 * @property integer $contacts
 * @property integer $contacts_owner
 * @property integer $sold_id
 *
 * Language
 *
 * @property string $name
 * @property string $text
 *
 * Relations
 *
 * @property Location $location
 * @property Region $region
 * @property User $user
 * @property PropertySold $sold
 *
 * @property array $view_ids
 * @property array $near_ids
 * @property array $image_ids
 * 
 * @property View[] $views
 * @property Near[] $nears
 * @property Image[] $images
 */
class Property extends Object
{
    private static $_min;
    private static $_max;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['price', 'filter', 'filter' => function ($value) {
                return preg_replace('/,/', '', $value);
            }],
            [['object_id', 'titul', 'sold_id'], 'integer'],
            [['price', 'note_agent', 'contacts', 'contacts_owner', 'commission'], 'string'],
            [['vat', 'top'], 'boolean'],
            [['object_id'], 'exist', 'skipOnError' => true, 'targetClass' => Object::className(), 'targetAttribute' => ['object_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['sold_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertySold::className(), 'targetAttribute' => ['sold_id' => 'id']],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'object_id' => Yii::t('app', 'Object'),
            'price' => Yii::t('app', 'Price'),
            'vat' => Yii::t('app', 'VAT'),
            'commission' => Yii::t('app', 'Commission'),
            'titul' => Yii::t('app', 'Title deeds'),
            'note_agent' => Yii::t('app', 'Visible only for agents'),
            'contacts' => Yii::t('app', 'Instead of the standard contacts'),
            'contacts_owner' => Yii::t('app', 'Owner contacts (Visible only for admins)'),
            'sold_id' => Yii::t('app', 'Sold status'),
            'top' => Yii::t('app', 'Top'),
        ]);
    }

    public function getStatus()
    {
        return $this->hasOne(PropertyStatus::className(), ['id' => 'status_id']);
    }

    public function getSold()
    {
        return $this->hasOne(PropertySold::className(), ['id' => 'sold_id']);
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $code = sprintf("%02d", $this->region_id) . sprintf("%03d", $this->location_id) . $this->object_id . '-' . $this->id;
        Yii::$app->db->createCommand()->update($this->tableName(), ['code' => $code], ['id' => $this->id])->execute();
    }

    public static function getList()
    {
        $temp = self::find()->all();

        $items = [];

        foreach ($temp as $t) {
            $items[$t->id] = $t->name . ' (' . $t->code . ')';
        }

        return $items;
    }

    public function getCover()
    {
        return [];
    }

    public static function priceMin()
    {
        if (!self::$_min) {
            self::$_min = self::find()->where(['status_id' => 1])->min('price');
        }
        return self::$_min;
    }

    public static function priceMax()
    {
        if (!self::$_max) {
            self::$_max = self::find()->where(['status_id' => 1])->max('price');
        }
        return self::$_max;
    }

    public static function weekItems($limit = 4)
    {
        return self::find()->where(['top' => true, 'status_id' => 1])->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }

    public static function lastItems($limit = 8)
    {
        return self::find()->where(['status_id' => 1])->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }

    // TODO: 
    public static function getYesOrNo($q)
    {
        if ($q) {
            return Yii::t('app', 'Yes');
        } else {
            return Yii::t('app', 'No');
        }
    }
}