<?php

namespace app\models;

use app\behaviors\LanguageBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "view".
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
class View extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view';
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
        return $this->hasMany(Object::className(), ['id' => 'object_id'])->viaTable('object_view', ['view_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return (new \yii\db\Query())
            ->select(['name'])
            ->from('view_lang')
            ->where(['lang_id' => Yii::$app->language])
            ->indexBy('view_id')
            ->column();
    }
}
