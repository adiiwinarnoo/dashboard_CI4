<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
	protected $table                = 'materis';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
	protected $allowedFields        = ['nama_pelajaran','id_kelas','link'];
	protected $useTimestamps        = true;
	
}
