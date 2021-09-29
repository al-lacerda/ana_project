<?php

use yii\db\Migration;

/**
 * Class m210929_040518_vagas
 */
class m210929_040518_vagas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vagas', [
            'id'=>$this->primaryKey(),
            'quantidade'=>$this->integer(),
            'empresa_id'=>$this->integer(), 
        ]);
        $this->addForeignKey(
            'empresa_FK', //nome da chave estrangeira
            'vagas', //qual tabela possui a chave estrangeira
            'empresa_id', //qual campo é a chave estrangeira
            'empresas', //tabela que é referenciada
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
            'empresa_FK',
            'vagas',
        );
        
        $this->dropTable('vagas');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210929_040518_vagas cannot be reverted.\n";

        return false;
    }
    */
}
