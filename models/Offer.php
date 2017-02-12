<?php

namespace app\models;

use voskobovich\linker\LinkerBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "offer".
 *
 * @property integer $id
 * @property string $code
 * @property string $text
 * @property string $name
 * @property string $phone1
 * @property string $phone2
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status_id
 *
 * @property array $property_ids
 *
 * @property Property[] $properties
 */
class Offer extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => LinkerBehavior::className(),
                'relations' => [
                    'property_ids' => ['properties'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'default', 'value' => function(){
                return substr(md5(time()), 0, 10);
            }],
            [['code'], 'required'],
            [['text'], 'string'],
            [['code'], 'string', 'max' => 32],
            [['phone1', 'phone2', 'email', 'name'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['code'], 'unique'],
            [['property_ids'], 'each', 'rule' => ['integer']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjectStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => Yii::t('app', 'Code'),
            'text' => Yii::t('app', 'Text'),
            'name' => Yii::t('app', 'Name'),
            'phone1' => Yii::t('app', 'Phone'),
            'phone2' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status_id' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasMany(Property::className(), ['id' => 'property_id'])->viaTable('offer_property', ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(ObjectStatus::className(), ['id' => 'status_id']);
    }
}
