<?php

use yii\db\Migration;

/**
 * Class m211020_002547_unique
 */
class m211020_002547_unique extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->alterColumn('adm', 'login', 'string unique');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('adm', 'login', 'string');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211020_002547_unique cannot be reverted.\n";

        return false;
    }
    */
}
