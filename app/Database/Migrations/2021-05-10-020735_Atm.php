<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Atm extends Migration
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
			'id_siswa'       => [
				'type'      	 => 'INT',
				'unsigned'       => true,
				'constraint' 	 => 5,
			],
			'nama_bank'       => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'no_rekening'       => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
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
		$this->forge->addForeignKey('id_siswa', 'siswa', 'id');
		$this->forge->createTable('atm');
	}

	public function down()
	{
		$this->forge->dropTable('atm');
	}
}
