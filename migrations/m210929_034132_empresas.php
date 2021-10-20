<?php

use yii\db\Migration;

/**
 * Class m210929_034132_empresas
 */
class m210929_034132_empresas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('empresas', [
            'id'=>$this->primaryKey(),
            'cnpj'=>$this->string(),
            'login'=>$this->string(),
            'senha'=>$this->string(),
           // 'nome'=>$this->string(),
            'entidade_id2'=>$this->integer(),
        ]);
        $this->addForeignKey(
            'entidade_FK2', //nome da chave estrangeira
            'empresas', //qual tabela possui a chave estrangeira
            'entidade_id2', //qual campo é a chave estrangeira
            'entidades', //tabela que é referenciada
            'id', //campo que é referenciado
            'RESTRICT' //tipo de implicação no update e no delete
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'entidade_FK2',
            'empresas',
        );
        
        $this->dropTable('empresas');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210929_034132_empresas cannot be reverted.\n";

        return false;
    }
    */
}
