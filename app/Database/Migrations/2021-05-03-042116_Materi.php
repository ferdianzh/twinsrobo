<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Materi extends Migration
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
			'id_modul'       => [
				'type'      	 => 'INT',
				'unsigned'       => true,
				'constraint' 	 => 5,
			],
			'judul_materi'       => [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> 255,
			],
			'konten_materi'       => [
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
		$this->forge->addForeignKey('id_modul', 'modul', 'id');
		$this->forge->createTable('materi');
	}

	public function down()
	{
		$this->forge->dropTable('materi');
	}
}
