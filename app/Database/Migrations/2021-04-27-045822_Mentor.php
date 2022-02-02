<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mentor extends Migration
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
			'deskripsi_singkat'       => [
				'type'       	=> 'TEXT',
				'null' 			=> false,
			],
			'rating'       => [
				'type'       	=> 'INT',
				'constraint'    => 255,
				'default' 		=> 0,
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
		$this->forge->createTable('mentor');
	}

	public function down()
	{
		$this->forge->dropTable('mentor');
	}
}
