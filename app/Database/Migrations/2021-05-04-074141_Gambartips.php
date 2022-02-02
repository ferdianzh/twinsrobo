<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gambartips extends Migration
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
			'id_tips'       => [
				'type'      	 => 'INT',
				'unsigned'       => true,
				'constraint' 	 => 5,
			],
			'alt_text'       => [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> 255,
			],
			'foto'       => [
				'type'       	=> 'VARCHAR',
				'constraint'    => 255,
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
		$this->forge->addForeignKey('id_tips', 'tips', 'id');
		$this->forge->createTable('gambar_tips');
	}

	public function down()
	{
		$this->forge->dropTable('gambar_tips');
	}
}
