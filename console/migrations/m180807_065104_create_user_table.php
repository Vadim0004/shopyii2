<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180807_065104_create_user_table extends Migration
{
	/**
	 * @inheritdoc
	 */
	public function up()
	{
		$this->createUser();
	}

	private function createUser()
	{
		$this->createTable('user', [
			'id' => $this->primaryKey(),
			'name' => $this->string(255)->notNull(),
			'email' => $this->string(255)->notNull(),
			'password' => $this->string(255)->notNull(),
			'role' => $this->string(50)->notNull(),
		]);

		$this->insert('user', [
			'id' => 3,
			'name' => 'Александр',
			'email' => 'alex@mail.com',
			'password' => '111111',
			'role' => '',
		]);

		$this->insert('user', [
			'id' => 4,
			'name' => 'Виктор',
			'email' => 'viktor@gmail.com',
			'password' => '111111',
			'role' => 'admin',
		]);

		$this->insert('user', [
			'id' => 5,
			'name' => 'Сергей',
			'email' => 'serg@mail.com',
			'password' => '111111',
			'role' => '',
		]);

		$this->insert('user', [
			'id' => 29,
			'name' => 'Вадим',
			'email' => 'vadimtestacc@gmail.com',
			'password' => '111111',
			'role' => 'admin',
		]);

	}

    public function down()
    {
        $this->dropTable('user');
    }
}
