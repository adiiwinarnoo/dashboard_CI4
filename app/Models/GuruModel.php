<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
	protected $table                = 'guru';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
	protected $allowedFields        = ['id_guru', 'Nama','Nomor_Induk'];
	protected $useTimestamps        = false;
	
	public function detail_guru($id_guru)
    {
        $mapel = $this->db->table('guru');
		$mapel->select('*');
		$mapel->join('dtl_guru','dtl_guru.id_guru = guru.id_guru');
		$query = $mapel->getWhere(['id_guru'=>$id_guru])->getResult();

       
		return view('query');
    }
}
