<?php

namespace app\models;

use app\behaviors\CreatorBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $path
 * @property string $hash
 * @property string $extension
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property integer $status
 * @property integer $created_at
 *
 * @property User $user
 * @property Image[] $images
 */
class File extends ActiveRecord
{
	const STATUS_DISABLED = 0;
	const STATUS_ENABLED = 1;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
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
            CreatorBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path', 'hash', 'extension', 'type', 'size'], 'required'],
            [['user_id', 'size', 'status'], 'integer'],
			[['name'], 'string', 'max' => 255],
            [['hash', 'type'], 'string', 'max' => 32],
            [['extension', 'path'], 'string', 'max' => 10],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
			['status', 'default', 'value' => self::STATUS_ENABLED],
			['status', 'in', 'range' => [self::STATUS_ENABLED, self::STATUS_DISABLED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => Yii::t('app', 'User'),
            'path' => Yii::t('app', 'Path'),
            'hash' => Yii::t('app', 'Hash'),
            'extension' => Yii::t('app', 'Extension'),
            'type' => Yii::t('app', 'Type'),
            'size' => Yii::t('app', 'Size'),
			'name' => Yii::t('app', 'Name'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created'),
        ];
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
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['file_id' => 'id']);
    }

    public function beforeDelete()
    {
        foreach ($this->images as $image) {
            $image->delete();
        }

        return parent::beforeDelete();
    }

    public function afterDelete()
	{
		parent::afterDelete();

		$dub = File::findOne([
			'path' => $this->path,
			'hash' => $this->hash,
			'extension' => $this->extension,
		]);

		$file = Yii::$app->params['filePath'] . '/' . $this->path . '/' . $this->id . '.' . $this->extension;

		if (empty($dub) && file_exists($file)) {
			unlink($file);
		}
	}
}
