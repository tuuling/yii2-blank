<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authkey
 **/
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'user';
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id)
	{
		return static::findOne($id);
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{

		return null;
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 *
	 * @return static|null
	 */
	public static function findByUsername($username)
	{
		return static::findOne(['username' => $username]);
	}

	/**
	 * @inheritdoc
	 */
	public function getId()
	{
		return $this->getPrimaryKey();
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey()
	{
		return $this->authkey;
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey)
	{
		return $this->authkey === $authKey;
	}

	/**
	 * @param  string $password password to validate
	 *
	 * @return boolean if password provided is valid for current user
	 */
	public function validatePassword($password)
	{
		return Yii::$app->getSecurity()->validatePassword($password, $this->password);
	}

	/**
	 * @param string $password
	 *
	 * @return string
	 */
	public function setPassword($password)
	{
		return $this->password = Yii::$app->getSecurity()->generatePasswordHash($password);
	}

	public function generatePassword()
	{
		return $this->password = Yii::$app->getSecurity()->generatePasswordHash(Yii::$app->getSecurity()->generateRandomString(16));
	}

	public function setAuthKey()
	{
		return $this->authkey = Yii::$app->getSecurity()->generateRandomString();
	}
}
