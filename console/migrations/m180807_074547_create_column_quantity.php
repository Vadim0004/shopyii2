<?php

use yii\db\Migration;

/**
 * Class m180807_074547_create_column_quantity
 */
class m180807_074547_create_column_quantity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'quantity', $this->integer(1)->notNull()->defaultValue('0'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180711_090915_create_column_quantity cannot be reverted.\n";

        return false;
    }
}
