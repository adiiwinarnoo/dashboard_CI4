<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'nomor_induk' => '17552069',
			'password' => password_hash('12345',PASSWORD_BCRYPT),
			'nama' => 'adiwina',
		];
		$this->db->table('admin')->insert($data);
	}
}
