<?php

use yii\db\Migration;

/**
 * Class m180802_134350_create_address_book
 */
class m180802_134350_create_address_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('address_book', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->notNull(),
            'lastname' => $this->string(32),
            'gender' => $this->string(4),
            'company' => $this->string(32),
            'street_address' => $this->string(64),
            'postcode' => $this->string(10),
            'city' => $this->string(32),
            'state' => $this->string(32),
            'country_id' => $this->integer(11),
            '_api_time_modified' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()')),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('address_book');
    }
}
