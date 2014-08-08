<?php


class m140807_133413_create_tables extends CDbMigration
{
	public function up()
	{
	
		$this->createTable('tasks', array(
		  'id' => 'pk',
		  'message_id' => 'string NOT NULL UNIQUE',
		  'name' => 'tinytext NOT NULL',
		  'note' => 'text',
		  'status' => 'int(11) NOT NULL',
		));
	

		$this->createTable('responsible_users_list', array(
		  'id' => 'pk',
		  'name' => 'tinytext NOT NULL',
		  'active' => 'tinyint(1) NOT NULL',
		));
		
	}
	
	public function down()
	{
		$this->dropTable('tasks');
		$this->dropTable('responsible_users_list');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}