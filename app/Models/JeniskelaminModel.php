<?php

namespace App\Models;

use CodeIgniter\Model;

class JeniskelaminModel extends Model
{
	protected $table                = 'jeniskelamins';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
	protected $allowedFields        = ['jeniskelamin'];
	protected $useTimestamps        = false;
	
}
