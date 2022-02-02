<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Modul extends Migration
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
			'judul_modul'       => [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> 255,
			],
			'logo'       => [
				'type'       	=> 'VARCHAR',
				'constraint'    => 255,
			],
			'harga_modul'       => [
				'type'       	=> 'INT',
				'constraint'    => 11,
			],
			'deskripsi'       => [
				'type'       	=> 'TEXT',
				'null'    		=> false,
			],
			'rating'       => [
				'type'       	=> 'INT',
				'constraint'    => 5,
				'default'		=> 0,
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
		$this->forge->createTable('modul');
	}

	public function down()
	{
		$this->forge->dropTable('modul');
	}
}
