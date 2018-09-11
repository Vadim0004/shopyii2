<?php

use yii\db\Migration;

/**
 * Class m180802_152009_create_countries
 */
class m180802_152009_create_countries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{countries}}', [
            'id' => $this->primaryKey(),
            'countries_name' => $this->string(64),
            'countries_iso_code_2' => $this->string(2),
            'countries_iso_code_3' => $this->string(3),
        ], $tableOptions);

        $this->insert('{{countries}}', [
            'countries_name' => 'Afghanistan',
            'countries_iso_code_2' => 'AF',
            'countries_iso_code_3' => 'AFG',
        ]);

        $this->insert('{{countries}}', [
            'countries_name' => 'Belarus',
            'countries_iso_code_2' => 'BY',
            'countries_iso_code_3' => 'BLR',
        ]);

        $this->insert('{{countries}}', [
            'countries_name' => 'Ukraine',
            'countries_iso_code_2' => 'UA',
            'countries_iso_code_3' => 'UAH',
        ]);

        $this->insert('{{countries}}', [
            'countries_name' => 'Armenia',
            'countries_iso_code_2' => 'AM',
            'countries_iso_code_3' => 'ARM',
        ]);

        $this->insert('{{countries}}', [
            'countries_name' => 'Australia',
            'countries_iso_code_2' => 'AU',
            'countries_iso_code_3' => 'AUS',
        ]);

        $this->insert('{{countries}}', [
            'countries_name' => 'Belgium',
            'countries_iso_code_2' => 'BE',
            'countries_iso_code_3' => 'BEL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{countries}}');
    }

}
