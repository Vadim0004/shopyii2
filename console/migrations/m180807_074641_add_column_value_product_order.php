<?php

use yii\db\Migration;

/**
 * Class m180807_074641_add_column_value_product_order
 */
class m180807_074641_add_column_value_product_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product_order', 'value', $this->float()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180731_121030_add_column_value_product_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180731_121030_add_column_value_product_order cannot be reverted.\n";

        return false;
    }
    */
}
