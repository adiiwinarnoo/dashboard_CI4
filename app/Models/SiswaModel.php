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


}
