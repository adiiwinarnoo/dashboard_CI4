<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
	protected $table                = 'students';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
	protected $allowedFields        = ['Nomor_Induk','Nama','Id_Kelas','Id_Jurusan','id_jeniskelamin'];
	protected $useTimestamps        = true;


    public function detail_siswa($nisn)
    {
        $siswa = $this->db->table('students');
		$siswa->select('Nomor_Induk, Nama, kelas, Jurusan, jeniskelamin');
		$siswa->join('kelas','kelas.id = students.kelas_id')
              ->join('jurusans','jurusans.id = students.jurusan_id')
              ->join('jeniskelamins','jeniskelamins.id = students.jeniskelamin_id');
		$query = $siswa->getWhere(['Nomor_Induk'=>$nisn]);
		return $query->getResult();
    }


}
