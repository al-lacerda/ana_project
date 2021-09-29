<?php

use yii\db\Migration;

/**
 * Class m210929_000502_entidades
 */
class m210929_000502_entidades extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('entidades', [
            'id'=>$this->primaryKey(),
            'nome'=>$this->string(),
            'coordenador'=>$this->string(),
            'login'=>$this->string(),
            'senha'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('entidades');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210929_000502_entidades cannot be reverted.\n";

        return false;
    }
    */
}
