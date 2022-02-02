<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembelian extends Migration
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
			'order_id'		=> [
				'type' 			=> 'VARCHAR',
				'constraint'	=> 100
			], // id untuk payment api
			// 'id_atm'       => [
			// 	'type'      	 => 'INT',
			// 	'unsigned'       => true,
			// 	'constraint' 	 => 5,
			// ],
			'id_siswa'       => [
				'type'      	 => 'INT',
				'unsigned'       => true,
				'constraint' 	 => 5,
			],
			'id_modul'       => [
				'type'      	 => 'INT',
				'unsigned'       => true,
				'constraint' 	 => 5,
			],
			'rekening_penerima'       => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'status'       => [
				'type'       => 'VARCHAR',
				'constraint' => 20,
				'default'		=> 'pending',
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
		// $this->forge->addForeignKey('id_atm', 'atm', 'id');
		$this->forge->addForeignKey('id_siswa', 'siswa', 'id');
		$this->forge->addForeignKey('id_modul', 'modul', 'id');
		$this->forge->createTable('pembelian');
	}

	public function down()
	{
		$this->forge->dropTable('pembelian');
	}
}
