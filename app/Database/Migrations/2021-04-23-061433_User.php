<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'username'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'nama_depan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'nama_belakang'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'jenis_kelamin'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'tanggal_lahir'       => [
				'type'       => 'DATE'
			],
			'phone'				=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> '100',
			],
			'nationality'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> '100',
			],
			'kota'				=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> '100',
			],
			'foto'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
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
		$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
