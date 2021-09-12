<?php

namespace App\Models;

use CodeIgniter\Model;

class Mapel extends Model
{
	
	protected $table                = 'dtl_guru';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
	protected $allowedFields        = ['Pelajaran'];

	
}
