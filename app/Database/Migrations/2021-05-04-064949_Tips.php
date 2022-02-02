<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tips extends Migration
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
			'id_kategori'       => [
				'type'      	 => 'INT',
				'unsigned'       => true,
				'constraint' 	 => 5,
			],
			'judul_tips'       => [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> 255,
			],
			'konten_tips'       => [
				'type'       	=> 'TEXT',
				'null'    		=> false,
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
		$this->forge->addForeignKey('id_kategori', 'kategori', 'id');
		$this->forge->createTable('tips');
	}

	public function down()
	{
		$this->forge->dropTable('tips');
	}
}
