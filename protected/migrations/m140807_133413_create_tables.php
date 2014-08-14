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
		  'id' => 'pk',
		  'message_id' => 'string DEFAULT NULL UNIQUE',
		  'responsible_user_id' => 'int(11) NOT NULL',
		  'note' => 'text',
		  'status' => 'int(11) NOT NULL',
		  'assigned_by_user_id' => 'int(11) NOT NULL',
		  'date_updated' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		  'date_created' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		)); 
	

		$this->createTable('users', array(
		  'id' => 'pk',
		  'name' => 'tinytext NOT NULL',
		  'password_hash' => 'CHAR(40)',
		  'active' => 'tinyint(1) NOT NULL',
		  'date_updated' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		  'date_created' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		));
		
		
		$this->createTable('thunderbird_clients', array(
		  'id' => 'pk',
		  'user_id' => 'int(10) NOT NULL',
		  'installation_id' => 'string NOT NULL',
		  'date_created' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		));
		
		
		$this->createTable('thunderbird_sync_list', array(
		  'id' => 'pk',
		  'installation_id' => 'int(10) NOT NULL',
		  'message_id' => 'string NOT NULL',
		  'timestamp' => 'timestamp NOT NULL',
		));
		
		
		$this->createTable('task_timeline_log', array(
		  'id' => 'pk',
		  'task_id' => 'int(10) NOT NULL',
		  'task_status' => 'int(11) NOT NULL',
		  'user_id' => 'int(11) NOT NULL',
		  'timestamp' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		));
		
		$this->addForeignKey('FK_owner_id', 'thunderbird_clients', 'user_id', 'users', 'id');
		$this->addForeignKey('FK_message_id', 'thunderbird_sync_list', 'message_id', 'tasks', 'message_id');
	
	}

	public function safeDown()
	{
		$this->dropForeignKey('FK_owner_id', 'thunderbird_clients');
		$this->dropForeignKey('FK_message_id', 'thunderbird_sync_list');
		
		
		$this->dropTable('tasks');
		$this->dropTable('users');
		$this->dropTable('thunderbird_clients');
		$this->dropTable('thunderbird_sync_list');
		$this->dropTable('task_timeline_log');
		
	}
	
}