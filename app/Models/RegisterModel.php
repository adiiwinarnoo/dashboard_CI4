<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
	protected $table                = 'admin';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
	protected $allowedFields        = ['nomor_induk','password','nama'];

	
}
