<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresas".
 *
 * @property int $id
 * @property string|null $cnpj
 * @property string|null $login
 * @property string|null $senha
 * @property int|null $entidade_id2
 *
 * @property Entidades $entidadeId2
 * @property Vagas[] $vagas
 */
class Empresas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entidade_id2'], 'integer'],
            [['cnpj', 'login', 'senha'], 'string', 'max' => 255],
            [['entidade_id2'], 'exist', 'skipOnError' => true, 'targetClass' => Entidades::className(), 'targetAttribute' => ['entidade_id2' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cnpj' => 'Cnpj',
            'login' => 'Login',
            'senha' => 'Senha',
            'entidade_id2' => 'Entidade Id2',
        ];
    }

    /**
     * Gets query for [[EntidadeId2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntidadeId2()
    {
        return $this->hasOne(Entidades::className(), ['id' => 'entidade_id2']);
    }

    /**
     * Gets query for [[Vagas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVagas()
    {
        return $this->hasMany(Vagas::className(), ['empresa_id' => 'id']);
    }
}
