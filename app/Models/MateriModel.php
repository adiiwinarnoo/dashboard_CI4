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

	

	public function getMateri()
	{
		return $this->db->table('materis')->join('kelas','kelas.id = materis.id_kelas')
		->get()->getResult();
	}

}
