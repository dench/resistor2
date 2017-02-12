<?php
/**
 * Created by PhpStorm.
 * User: Dench
 * Date: 28.01.2017
 * Time: 22:28
 */

namespace app\behaviors;

use yii\base\Behavior;

class FileUploadBehavior extends Behavior
{
	/**
	 * @var string the attribute that will receive user_id value
	 */
	public $userIdAttribute = 'user_id';
}