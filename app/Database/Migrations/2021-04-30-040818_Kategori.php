<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
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
			'id_kesulitan'       => [
				'type'      	 => 'INT',
				'unsigned'       => true,
				'constraint' 	 => 5,
			],
			'nama_kategori'       => [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> 255,
			],
			'logo'       => [
				'type'       	=> 'VARCHAR',
				'constraint'    => 255,
			],
			'deskripsi'       => [
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
		$this->forge->addForeignKey('id_kesulitan', 'kesulitan', 'id');
		$this->forge->createTable('kategori');
	}

	public function down()
	{
		$this->forge->dropTable('kategori');
	}
}
