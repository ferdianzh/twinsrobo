<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
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
			'id_mentor'       => [
				'type'      	 => 'INT',
				'unsigned'       => true,
				'constraint' 	 => 5,
			],
			'nama_kelas'       => [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> 255,
			],
			'deskripsi'       => [
				'type'       	=> 'TEXT',
				'null' 			=> false,
			],
			// 'kesulitan'			=> [
			// 	'type'           => 'INT',
			// 	'constraint'     => 5,
			// 	'unsigned'       => true,
			// ],
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
		$this->forge->addForeignKey('id_mentor', 'mentor', 'id');
		// $this->forge->addForeignKey('kesulitan', 'kesulitan', 'id');
		$this->forge->createTable('kelas');
	}

	public function down()
	{
		$this->forge->dropTable('kelas');
	}
}
