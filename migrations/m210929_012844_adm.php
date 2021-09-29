<?php

use yii\db\Migration;

/**
 * Class m210929_012844_adm
 */
class m210929_012844_adm extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('adm', [
            'id'=>$this->primaryKey(),
            'login'=>$this->string(),
            'senha'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('adm');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210929_012844_adm cannot be reverted.\n";

        return false;
    }
    */
}
