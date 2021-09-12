<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
	protected $table                = 'materis';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
	protected $allowedFields        = ['nama_pelajaran','id_kelas','link','created_at','updated_at'];
	protected $useTimestamps        = true;

	

	public function getMateri()
	{
		$materi = $this->db->table('materis');
		$materi->select('materis.id, nama_pelajaran, id_kelas, link, kelas');
		$materi->join('kelas','kelas.id = materis.id_kelas');
		$query = $materi->get();
		return $query->getResult();
		
	}
	public function search($cari)
	{
		return $this->table('materis')->like('nama_pelajaran', $cari);
	}

}
