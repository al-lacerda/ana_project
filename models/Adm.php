<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "adm".
 *
 * @property int $id
 * @property string|null $login
 * @property string|null $senha
 */
class Adm extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface

{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login','senha'], 'required'],
            [['login', 'senha'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'senha' => 'Senha',
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
 
    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new  yii\base\UnknownPropertyException();
    }
 
        /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
 
    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
       // throw new  yii\base\UnknownPropertyException();
    }
 
    public function validateAuthKey($authKey)
    {
        //throw new  yii\base\UnknownPropertyException();
    }
 
    public static function findByUsername($username){
        return self::findOne(['login'=>$username]);
    }
 
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->senha);

    }

    public function beforeSave($insert)
    {
       if (parent::beforeSave($insert)) {
           $this->senha = Yii::$app->security->generatePasswordHash($this->senha);
           return true;
       } else {
           return false;
       }
    }


}
