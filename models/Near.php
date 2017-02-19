<?php

namespace app\models;

use app\behaviors\LanguageBehavior;
use omgdef\multilingual\MultilingualQuery;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "near".
 *
 * @property integer $id
 * @property integer $position
 * 
 * Language
 *
 * @property string $name
 *
 * Relations
 * 
 * @property Object[] $objects
 */
class Near extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'near';
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
            [['position'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'position' => Yii::t('app', 'Position'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjects()
    {
        return $this->hasMany(Object::className(), ['id' => 'object_id'])->viaTable('object_near', ['near_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return (new \yii\db\Query())
            ->select(['name'])
            ->from('near_lang')
            ->where(['lang_id' => Yii::$app->language])
            ->indexBy('near_id')
            ->column();
    }

    /**
     * @return MultilingualQuery|ActiveQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }
}
