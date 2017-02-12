<?php

namespace app\models;

use app\behaviors\CreatorBehavior;
use app\behaviors\LanguageBehavior;
use app\behaviors\PositionBehavior;
use omgdef\multilingual\MultilingualQuery;
use voskobovich\linker\LinkerBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * This is the model class for table "object".
 *
 * @property integer $id
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
 * @property integer $code
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $position
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
 * @property ObjectStatus $status
 *
 * @property array $view_ids
 * @property array $near_ids
 * @property array $image_ids
 * 
 * @property View[] $views
 * @property Near[] $nears
 * @property Image[] $images
 * @property Parking $parking
 */
class Object extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            LanguageBehavior::className(),
            TimestampBehavior::className(),
            CreatorBehavior::className(),
            PositionBehavior::className(),
            [
                'class' => LinkerBehavior::className(),
                'relations' => [
                    'view_ids' => ['views'],
                    'near_ids' => ['nears'],
                    'image_ids' => ['images'],
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
            [['type_id', 'region_id', 'location_id', 'name'], 'required'],
            [['type_id', 'region_id', 'location_id', 'parking_id', 'covered', 'uncovered', 'plot', 'bathroom', 'bedroom', 'stage_id', 'status_id'], 'integer'],
            [['year'], 'integer', 'min' => 0, 'max' => 2100],
            [['solarpanel', 'sauna', 'furniture', 'conditioner', 'heating', 'pantry', 'tennis', 'pool'], 'boolean'],
            [['coordinates', 'address'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 20],
            [['code'], 'unique'],
            [['text', 'note_admin'], 'string'],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['parking_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parking::className(), 'targetAttribute' => ['parking_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjectStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['stage_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stage::className(), 'targetAttribute' => ['stage_id' => 'id']],
            [['view_ids', 'near_ids', 'image_ids'], 'each', 'rule' => ['integer']],
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
            'user_id' => Yii::t('app', 'Creator'),
            'status_id' => Yii::t('app', 'Status'),
            'type_id' => Yii::t('app', 'Property type'),
            'year' => Yii::t('app', 'Year built'),
            'region_id' => Yii::t('app', 'Region'),
            'location_id' => Yii::t('app', 'Location'),
            'coordinates' => Yii::t('app', 'Coordinates'),
            'address' => Yii::t('app', 'Address'),
            'covered' => Yii::t('app', 'Covered area'),
            'uncovered' => Yii::t('app', 'Uncovered area'),
            'plot' => Yii::t('app', 'Plot area'),
            'bathroom' => Yii::t('app', 'Bathrooms'),
            'bedroom' => Yii::t('app', 'Bedrooms'),
            'parking_id' => Yii::t('app', 'Parking'),
            'solarpanel' => Yii::t('app', 'Solar Panel'),
            'sauna' => Yii::t('app', 'Sauna'),
            'furniture' => Yii::t('app', 'Furniture'),
            'conditioner' => Yii::t('app', 'Conditioner'),
            'heating' => Yii::t('app', 'Central heating'),
            'pantry' => Yii::t('app', 'Pantry'),
            'tennis' => Yii::t('app', 'Tennis court'),
            'pool' => Yii::t('app', 'Pool'),
            'created_at' => Yii::t('app', 'Created'),
            'updated_at' => Yii::t('app', 'Updated'),
            'text' => Yii::t('app', 'Text'),
            'name' => Yii::t('app', 'Name'),
            'stage_id' => Yii::t('app', 'Stage construction'),
            'view_ids' => Yii::t('app', 'View from the window'),
            'near_ids' => Yii::t('app', 'Nearby'),
            'image_ids' => Yii::t('app', 'Photos'),
            'note_admin' => Yii::t('app', 'Visible only for admins'),
            'position' => Yii::t('app', 'Position'),
        ];
    }

    /**
     * @return MultilingualQuery|\yii\db\ActiveQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class(), ['languageField' => 'lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParking()
    {
        return $this->hasOne(Parking::className(), ['id' => 'parking_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViews()
    {
        return $this->hasMany(View::className(), ['id' => 'view_id'])
            ->viaTable($this->tableName() . '_view', [$this->tableName() . '_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNears()
    {
        return $this->hasMany(Near::className(), ['id' => 'near_id'])
            ->viaTable($this->tableName() . '_near', [$this->tableName() . '_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['id' => 'image_id'])
            ->viaTable($this->tableName() . '_image', [$this->tableName() . '_id' => 'id']);
    }
    
    public function getCountProperty()
    {
        return Property::find()->where(['object_id' => $this->id])->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(ObjectStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    public static function getMarkers($location_id = null)
    {
        $temp = self::find()->andFilterWhere(['location_id' => $location_id])->all();

        $items = [];

        foreach ($temp as $t) {
            $items[] = [
                'link' => Url::toRoute(['admin/property/update', 'id' => $t->id]),
                'status' => $t->status_id,
                'pos' => $t->coordinates,
                'title' => 'ID ' . $t->id . (!empty($t->address) ? ' ('. $t->address .') ' : '') . $t->name,
            ];
        }
        return $items;
    }

    public static function getList()
    {
        return (new \yii\db\Query())
            ->select(['name'])
            ->from('object_lang')
            ->where(['lang_id' => Yii::$app->language])
            ->indexBy('object_id')
            ->column();
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $code = sprintf("%02d", $this->region_id) . sprintf("%03d", $this->location_id) . $this->id;
        Yii::$app->db->createCommand()->update($this->tableName(), ['code' => $code], ['id' => $this->id])->execute();
    }
}
