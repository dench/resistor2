<?php

namespace app\models;

use voskobovich\linker\LinkerBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "request".
 *
 * @property integer $id
 * @property integer $created_at
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $mycity
 * @property string $rooms
 * @property string $distance
 * @property string $sqr
 * @property string $budget
 * @property string $region
 * @property string $text
 * @property string $status_id
 *
 * @property RequestStatus $status
 * @property Type[] $types
 */
class Request extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
            [
                'class' => LinkerBehavior::className(),
                'relations' => [
                    'type_ids' => ['types'],
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
            [['name', 'email'], 'required'],
            [['name', 'phone', 'email', 'mycity', 'rooms', 'distance', 'sqr', 'budget', 'region', 'text'], 'string', 'max' => 255],
            [['name', 'phone', 'email', 'mycity', 'rooms', 'distance', 'sqr', 'budget', 'region', 'text'], 'trim'],
            [['email'], 'email'],
            [['type_ids'], 'each', 'rule' => ['integer']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => RequestStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => Yii::t('app', 'Time'),
            'name' => Yii::t('app', 'Full name'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'mycity' => Yii::t('app', 'Your city'),
            'rooms' => Yii::t('app', 'Number of bedrooms'),
            'distance' => Yii::t('app', 'Distance from the sea'),
            'sqr' => Yii::t('app', 'Area'),
            'budget' => Yii::t('app', 'Budget'),
            'region' => Yii::t('app', 'Region'),
            'text' => Yii::t('app', 'Text'),
            'status_id' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created'),
            'type_ids' => Yii::t('app', 'Property type'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($this->isNewRecord) {

            $text = $this->text;

            if (empty($this->name)) {
                $text .= $this->getAttributeLabel('name') . ': ' . $this->name.'\n\r';
            }
            if (empty($this->phone)) {
                $text .= $this->getAttributeLabel('phone') . ': ' . $this->phone.'\n\r';
            }
            if (empty($this->mycity)) {
                $text .= $this->getAttributeLabel('mycity') . ': ' . $this->mycity.'\n\r';
            }
            if (empty($this->rooms)) {
                $text .= $this->getAttributeLabel('rooms') . ': ' . $this->rooms.'\n\r';
            }
            if (empty($this->distance)) {
                $text .= $this->getAttributeLabel('distance') . ': ' . $this->distance.'\n\r';
            }
            if (empty($this->sqr)) {
                $text .= $this->getAttributeLabel('sqr') . ': ' . $this->sqr.'\n\r';
            }
            if (empty($this->budget)) {
                $text .= $this->getAttributeLabel('budget') . ': ' . $this->budget.'\n\r';
            }
            if (empty($this->region)) {
                $text .= $this->getAttributeLabel('region') . ': ' . $this->region.'\n\r';
            }

            Yii::$app->mailer->compose()
                ->setTo(Yii::$app->params['adminEmail'])
                ->setFrom([$this->email => $this->name])
                ->setSubject(Yii::t('app', 'Search real estate'))
                ->setTextBody($text)
                ->send();

            Yii::$app->mailer->compose()
                ->setTo($this->email)
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setSubject(Yii::t('app', 'Search real estate'))
                ->setTextBody(Yii::t('app', 'Thank you, your application has been accepted and will be processed shortly.'))
                ->send();
        }
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(RequestStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypes()
    {
        return $this->hasMany(Type::className(), ['id' => 'type_id'])->viaTable('request_property_type', ['request_id' => 'id']);
    }
}
