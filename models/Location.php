<?php

namespace app\models;

use app\behaviors\LanguageBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "location".
 *
 * @property integer $id
 * @property integer $region_id
 * 
 * Language
 *
 * @property string $name
 * 
 * Relations
 *
 * @property Region $region
 * @property Object[] $objects
 */
class Location extends ActiveRecord
{
    private static $_list;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            LanguageBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_id', 'name'], 'required'],
            [['region_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => Yii::t('app', 'Region ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjects()
    {
        return $this->hasMany(Object::className(), ['location_id' => 'id']);
    }

    /**
     * @param null $region_id
     * @return array
     */
    public static function getList($region_id = null)
    {
        if (empty(self::$_list[$region_id])) {
            self::$_list[$region_id] = ArrayHelper::map(self::find()->where(['region_id' => $region_id])->all(), 'id', 'name');
        }

        return self::$_list[$region_id];
    }
}
