<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
	protected $table                = 'guru';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
	// protected $allowedFields        = ['guru_id', 'Nama','Nomor_Induk','id_kelas','id_jeniskelamin','photo'];
	protected $allowedFields        = ['guru_id, Nama, Nomor_Induk, kelas_id, jeniskelamin_id, photo'];
	protected $useTimestamps        = true;
	
	public function detail_guru($nisn)
    {
        $guru = $this->db->table('students');
		$guru->select('Nomor_Induk, Nama, kelas, Jurusan, jeniskelamin');
		$guru->join('kelas','kelas.id = students.kelas_id')
			 ->join('jurusans','jurusans.id = students.jurusan_id')
			 ->join('jeniskelamins','jeniskelamins.id=students.jeniskelamin_id');
		$query = $guru->getWhere(['Nomor_Induk'=>$nisn]);

       
		return $query->getResult();
    }
	public function GuruAll()
    {
        $guru = $this->db->table('guru');
		$guru->select('guru.id, Nama, Nomor_Induk, photo, Pelajaran, kelas, jeniskelamin');
		$guru->join('dtl_guru','dtl_guru.id = guru.guru_id')
			 ->join('kelas','kelas.id = guru.kelas_id')
			 ->join('jeniskelamins','jeniskelamins.id=guru.jeniskelamin_id');
		$query = $guru->get();
		return $query->getResult();
    }

	public function GetPhoto($data)
	{
		$query = $this->db->table('guru')->insert($data);
		return $query;
	}
	public function search($cari)
	{
		return $this->table('guru')->like('Nama', $cari);
	}

}
