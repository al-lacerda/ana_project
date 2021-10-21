<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pessoas".
 *
 * @property int $id
 * @property string|null $cpf
 * @property string|null $login
 * @property string|null $senha
 * @property int|null $entidade_id
 *
 * @property Entidades $entidade
 */
class Pessoas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pessoas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login','senha','cpf'], 'required'],
            [['entidade_id'], 'integer'],
            [['cpf', 'login', 'senha'], 'string', 'max' => 255],
            [['entidade_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entidades::className(), 'targetAttribute' => ['entidade_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cpf' => 'Cpf',
            'login' => 'Login',
            'senha' => 'Senha',
            'entidade_id' => 'Entidade ID',
        ];
    }

    /**
     * Gets query for [[Entidade]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntidade()
    {
        return $this->hasOne(Entidades::className(), ['id' => 'entidade_id']);
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
