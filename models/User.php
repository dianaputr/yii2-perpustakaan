<?php

namespace app\models;

use Yii;
use yii\Helpers\ArrayHelper;
use kartik\mpdf\Pdf;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property integer $role
 *
 * @property Peminjaman[] $peminjamen
 */
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
    public function rules()
    {
        return [
            [['nama', 'username', 'password', 'foto', 'role'], 'required'],
            [['role'], 'integer'],
            [['nama', 'username', 'password'], 'string', 'max' => 255],
            [['authKey', 'accessToken'], 'string', 'max' => 50],
            [['foto'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
             'id' => 'ID',
            'nama' => 'Nama',
            'username' => 'Username',
            'password' => 'Password',
            /*'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',*/
            'foto' => 'Foto',
            'role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjamen()
    {
        return $this->hasMany(Peminjaman::className(), ['id_user' => 'id']);
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }
    
    public function validateAuthKey($authKey)
    {
        return null;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
    public static function isAdmin()
    {
        if(isset(Yii::$app->user->identity->id)){
            return true;
        } else{
            return false;
        }
    }

    public static function getList()
    {
        return ArrayHelper::map(User::find()->all(),'id','nama');
    }
}
