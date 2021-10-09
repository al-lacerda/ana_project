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
class Adm extends \yii\db\ActiveRecord
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
}
