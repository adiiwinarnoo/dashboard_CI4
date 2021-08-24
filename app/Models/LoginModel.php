<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
	protected $table                = 'students';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $returnType           = 'object';
	protected $allowedFields        = ['Nomor_Induk','Password'];

	// Dates
	protected $useTimestamps        = false;
	
	public function signin($nisn, $password)
	{
		return $this->getWhere(['Nomor_Induk' => $nisn, 'Password'=>$password])->getResult();
	}
}
