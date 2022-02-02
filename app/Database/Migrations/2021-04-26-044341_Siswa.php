<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_user'       => [
				'type'      	 => 'INT',
				'unsigned'       => true,
				'constraint' 	 => 5,
			],
			'nama_sekolah'       => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'personal_goal'	=> [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'vip'       => [
				'type'       	=> 'BOOL',
				'null' 			=> true,
				'default'		=> '0',
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
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_user', 'user', 'id');
		$this->forge->createTable('siswa');
	}

	public function down()
	{
		$this->forge->dropTable('siswa');
	}
}
