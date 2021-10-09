<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entidades".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $coordenador
 * @property string|null $login
 * @property string|null $senha
 *
 * @property Empresas[] $empresas
 * @property Pessoas[] $pessoas
 */
class Entidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entidades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login','senha', 'nome','coordenador'], 'required'],
            [['nome', 'coordenador', 'login', 'senha'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'coordenador' => 'Coordenador',
            'login' => 'Login',
            'senha' => 'Senha',
        ];
    }

    /**
     * Gets query for [[Empresas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresas::className(), ['entidade_id2' => 'id']);
    }

    /**
     * Gets query for [[Pessoas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPessoas()
    {
        return $this->hasMany(Pessoas::className(), ['entidade_id' => 'id']);
    }
}
