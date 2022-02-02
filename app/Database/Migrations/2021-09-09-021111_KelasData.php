<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KelasData extends Migration
{
	public function up()
	{
		$this->forge->addfield([
			'id' 						=> [
				'type'				=> 'INT',
				'constraint'		=> 5,
				'unsigned'       	=> true,
				'auto_increment'	=> true
			],
			'kelas_id' 			=> [
				'type'			=> 'INT',
				'constraint'	=> 5,
				'unsigned'     => true
			],
			'user_id' 			=> [
				'type'			=> 'INT',
				'constraint'	=> 5,
				'unsigned'     => true
			],
			'mentor_id' 		=> [
				'type'			=> 'INT',
				'constraint'	=> 5,
				'unsigned'     => true
			],
			'status' 			=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50
			],
			'user_rating' 			=> [
				'type'			=> 'INT',
				'constraint'	=> 5
			],
			'komentar' 			=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255,
				'null' 			=> false
			],
			'created_at' 		=> [
				'type' 			=> 'DATETIME',
				'null' 			=> true,
			],
			'updated_at' 		=> [
				'type' 			=> 'DATETIME',
				'null' 			=> true,
			],
		]);
		// $this->forge->addKey('id', true);
		// $this->forge->addForeignKey('kelas_id', 'kelas', 'id');
		// $this->forge->addForeignKey('user_id', 'user', 'id');
		// $this->forge->addForeignKey('mentor_id', 'mentor', 'id');
		// $this->forge->createTable('kelas_data');
	}

	public function down()
	{
		$this->forge->dropTable('kelas_data');
	}
}
