<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
	protected $table                = 'students';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
	protected $allowedFields        = ['Nomor_Induk','Nama','Password','Id_Kelas','Id_Jurusan','id_jeniskelamin'];
	protected $useTimestamps        = true;

	public function siswaAll()
    {
        $students = $this->db->table('students');
		// $guru->select('*');
		$students->select('students.id, Nomor_Induk, Nama, Password, kelas_id, jurusan_id, jeniskelamin_id, kelas, Jurusan, jeniskelamin');
		$students->join('jurusans','jurusans.id = students.jurusan_id')
			 ->join('kelas','kelas.id = students.kelas_id')
			 ->join('jeniskelamins','jeniskelamins.id= students.jeniskelamin_id');
		$query = $students->get();
		return $query->getResult();
    }
	public function search($cari)
	{
		return $this->table('students')->like('Nama', $cari);
	}
	
	public function siswaNisn($nisn)
	{
		$siswa = $this->db->table('students');
		$siswa->select('*');
		$siswa->join('kelas','kelas.id = students.kelas_id')
			  ->join('jurusans','jurusans.id = students.jurusan_id')
			  ->join('jeniskelamins', 'jeniskelamins.id = students.jeniskelamin_id');
		$query = $siswa->getWhere(['Nomor_Induk'=>$nisn]);
		return $query->getResult();
	}



}
