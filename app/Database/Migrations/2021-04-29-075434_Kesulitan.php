<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kesulitan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'kesulitan'       => [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> 255,
			],
			'skore'       => [
				'type'       	=> 'INT',
				'constraint' 	=> 5,
			],
			'gambar'       => [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> 255,
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
		$this->forge->createTable('kesulitan');
	}

	public function down()
	{
		$this->forge->dropTable('kesulitan');
	}
}
