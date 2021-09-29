<?php

use yii\db\Migration;

/**
 * Class m210929_033811_pessoas
 */
class m210929_033811_pessoas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pessoas', [
            'id'=>$this->primaryKey(),
            'cpf'=>$this->string(),
            'login'=>$this->string(),
            'senha'=>$this->string(),
            'entidade_id'=>$this->integer(),
        ]);
        $this->addForeignKey(
            'entidade_FK', //nome da chave estrangeira
            'pessoas', //qual tabela possui a chave estrangeira
            'entidade_id', //qual campo é a chave estrangeira
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
            'entidade_FK',
            'pessoas',
        );
        
        $this->dropTable('pessoas');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210929_033811_pessoas cannot be reverted.\n";

        return false;
    }
    */
}
