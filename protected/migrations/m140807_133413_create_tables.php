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
		  'status' => 'int(2) NOT NULL',
		  'assigned_by_user_id' => 'int(11) NOT NULL',
		  'date_updated' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		  'date_created' => 'DATETIME',
		));

        $this->createTable('tags', array(
            'id' => 'pk',
            'name' => 'VARCHAR(20) NOT NULL',
            'user_id' => 'int(10) NOT NULL',
            'date_updated' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'date_created' => 'DATETIME',
        ));

        $this->createTable('TaskTagAssoc', array(
           'id' => 'pk',
           'task_id' => 'INT(10) NOT NULL',
           'tag_id' => 'INT(10) NOT NULL',
           'user_id' => 'INT(10) NOT NULL',
           'date_updated' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
           'date_created' => 'DATETIME',
        ));

		$this->createTable('users', array(
		  'id' => 'pk',
		  'username' => 'VARCHAR(45) NOT NULL',
          'email' => 'VARCHAR(60) DEFAULT NULL UNIQUE',
		  'password' => 'CHAR(64) NOT NULL',
		  'disabled' => 'tinyint(1) DEFAULT NULL',
          'date_entered' => 'DATETIME',
		  'date_updated' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		  'date_created' => 'DATETIME',
		));

        //CREATE ADMIN ACCOUNT
        $this->insert('users',array(
            'username' =>'admin',
            'password' => md5('admin'),
        ));
		
		
		$this->createTable('thunderbird_clients', array(
		  'id' => 'pk',
		  'user_id' => 'int(10) NOT NULL',
		  'installation_id' => 'string NOT NULL',
		  'date_created' => 'DATETIME',
		));
		
		
		$this->createTable('thunderbird_sync_list', array(
		  'id' => 'pk',
		  'installation_id' => 'int(10) NOT NULL',
		  'message_id' => 'string NOT NULL',
		  'timestamp' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		));
		
		
		$this->createTable('task_timeline_log', array(
		  'id' => 'pk',
		  'task_id' => 'int(10) NOT NULL',
		  'task_status' => 'int(11) NOT NULL',
		  'user_id' => 'int(11) NOT NULL',
		  'timestamp' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		));


        $this->addForeignKey('FK_tag', 'TaskTagAssoc', 'tag_id', 'tags', 'id');
        $this->addForeignKey('FK_task', 'TaskTagAssoc', 'task_id', 'tasks', 'id');
        $this->addForeignKey('FK_owner_id', 'thunderbird_clients', 'user_id', 'users', 'id');
		$this->addForeignKey('FK_message_id', 'thunderbird_sync_list', 'message_id', 'tasks', 'message_id');
	
	}

	public function safeDown()
	{
        $this->dropForeignKey('FK_tag', 'TaskTagAssoc');
        $this->dropForeignKey('FK_task', 'TaskTagAssoc');
		$this->dropForeignKey('FK_owner_id', 'thunderbird_clients');
		$this->dropForeignKey('FK_message_id', 'thunderbird_sync_list');
		
		
		$this->dropTable('tasks');
		$this->dropTable('users');
		$this->dropTable('thunderbird_clients');
		$this->dropTable('thunderbird_sync_list');
		$this->dropTable('task_timeline_log');
		
	}
	
}