<?php

namespace app\models;

use app\behaviors\LanguageBehavior;
use app\behaviors\PositionBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "object_status".
 *
 * @property integer $id
 * @property string $class
 * @property integer $position
 *
 * @property Object[] $objects
 */
class ObjectStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_status';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            LanguageBehavior::className(),
            PositionBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position'], 'integer'],
            [['class'], 'string', 'max' => 20],
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
            'id' => 'ID',
            'class' => Yii::t('app', 'Class'),
            'name' => Yii::t('app', 'Name'),
            'position' => Yii::t('app', 'Position'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjects()
    {
        return $this->hasMany(Object::className(), ['status_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return ArrayHelper::map(self::find()->orderBy('position')->all(), 'id', 'name');
    }
}
