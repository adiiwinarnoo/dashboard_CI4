<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createadmin extends Migration
{
	public function up()
	{
		$this->db->addField([
				'id' =>[
					'type' => 'INT',
					'constraint'=> 20,
					'unsigned' => true,
					'auto_increment' => true,
				],
				'nomor_induk' =>[
					'type' => 'INT',
					'constraint'=> 20,
				],
				'password' =>[
					'type' => 'VARCHAR',
					'constraint'=> 65,
				],

		]);
		$this->db->addPrimaryKey('id', true);
		$this->db->createTable('admin');
		
	}

	public function down()
	{
		$this->db->dropTable('admin');
	}
}
