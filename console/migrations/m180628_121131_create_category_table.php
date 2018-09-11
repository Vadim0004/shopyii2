<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m180628_121131_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createCategory();
    }
    
    private function createCategory()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'sort_order' => $this->integer(11)->notNull(),
            'status' => $this->integer(11)->defaultValue(1)->notNull(),
        ], $tableOptions);
        
        $this->insert('category', [
            'id' => 13,
            'name' => 'Ноутбуки',
            'sort_order' => 1,
            'status' => 1,
        ]);

        $this->insert('category', [
            'id' => 14,
            'name' => 'Планшеты',
            'sort_order' => 2,
            'status' => 1,
        ]);

        $this->insert('category', [
            'id' => 15,
            'name' => 'Мониторы',
            'sort_order' => 3,
            'status' => 1,
        ]);

        $this->insert('category', [
            'id' => 16,
            'name' => 'Игровые компьютеры',
            'sort_order' => 4,
            'status' => 1,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
