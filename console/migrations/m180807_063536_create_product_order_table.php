<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_order`.
 */
class m180807_063536_create_product_order_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('product_order', [
            'id' => $this->primaryKey(),
            'user_name' => $this->string(255)->notNull(),
            'user_phone' => $this->string(255)->notNull(),
            'user_comment' => $this->text()->notNull(),
            'user_id' => $this->integer(11)->null(),
            'date' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()')),
            'products' => $this->text()->notNull(),
            'status' => $this->integer(11)->defaultValue(1)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('product_order');
    }
}
