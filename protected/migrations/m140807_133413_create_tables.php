<?php


class m140807_133413_create_tables extends CDbMigration
{
/*
	public function up()
	{
	
	}
	
	public function down()
	{

	}
*/
	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	
		$this->createTable('tasks', array(
		  'message_id' => 'string NOT NULL PRIMARY KEY',
		  'name' => 'tinytext NOT NULL',
		  'note' => 'text',
		  'status' => 'int(11) NOT NULL',
		  'delegated_by' => 'tinytext NOT NULL',
		  'timestamp' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		)); 
	

		$this->createTable('responsible_users_list', array(
		  'id' => 'pk',
		  'name' => 'tinytext NOT NULL',
		  'password_hash' => 'varchar(64)',
		  'active' => 'tinyint(1) NOT NULL',
		));
		
		
		$this->createTable('thunderbird_clients', array(
		  'id' => 'pk',
		  'owner_id' => 'int(10) NOT NULL',
		  'installation_id' => 'string NOT NULL',
		));
		
		
		$this->createTable('thunderbird_sync_list', array(
		  'id' => 'pk',
		  'installation_id' => 'int(10) NOT NULL',
		  'message_id' => 'string NOT NULL',
		  'timestamp' => 'timestamp NOT NULL',
		));
		
		$this->addForeignKey('FK_owner_id', 'thunderbird_clients', 'owner_id', 'responsible_users_list', 'id');
		$this->addForeignKey('FK_message_id', 'thunderbird_sync_list', 'message_id', 'tasks', 'message_id');
	
	}

	public function safeDown()
	{
		$this->dropForeignKey('FK_owner_id', 'thunderbird_clients');
		$this->dropForeignKey('FK_message_id', 'thunderbird_sync_list');
		
		
		$this->dropTable('tasks');
		$this->dropTable('responsible_users_list');
		$this->dropTable('thunderbird_clients');
		$this->dropTable('thunderbird_sync_list');
		
	}
	
}