<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notifikasi extends Migration
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
			'id_siswa' 			=> [
				'type'			=> 'INT',
				'constraint'	=> 5,
				'unsigned'     => true
			],
			'id_modul' 			=> [
				'type'			=> 'INT',
				'constraint'	=> 5,
				'unsigned'     => true
			],
			'status'				=> [
				'type'			=> 'INT',
				'constraint'	=> 1,
			],
			'deskripsi'			=> [
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
		// $this->forge->addKey('id', true);
		// $this->forge->addForeignKey('id_siswa', 'siswa', 'id');
		// $this->forge->addForeignKey('id_modul', 'modul', 'id');
		// $this->forge->createTable('notifikasi');
	}

	public function down()
	{
		$this->forge->dropTable('notifikasi');
	}
}
