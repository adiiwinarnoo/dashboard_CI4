<?php

namespace App\Controllers;
use DB;
use App\Models\KelasModel;
use App\Models\JurusanModel;
use App\Models\JeniskelaminModel;

class Home extends BaseController
{
	public function index()
	{
		$data =[
		'title' => 'Home',
		'isi' => 'home',
		];
	

		echo view('adminLte/wraper',$data);

	}
	public function kelola_siswa()
	{
		$db  = \Config\Database::connect();
		
		$builder 	= $db->table('students')
		->join('kelas','kelas.id = students.Id_Kelas')
		->join('jurusans','jurusans.id = students.Id_Jurusan')
		->join('jeniskelamins','jeniskelamins.id = students.id_jeniskelamin');
		$query   	= $builder->get()->getResult();

		echo view ('admin/kelola_siswa', compact('query'));
	}

	public function create()
	{
		$kelas = new KelasModel();
		$jurusan = new JurusanModel();
		$jeniskelamin = new JeniskelaminModel();
		$data['kelasid']= $kelas->findAll();
		$data['jurusanid']= $jurusan->findAll();
		$data['jeniskelaminid']= $jeniskelamin->findAll();
		return view('admin/tambah_siswa', $data);
	}
	public function store()
	{
		$db  = \Config\Database::connect();
		
		$builder 	= $db->table('students')
		->join('kelas','kelas.id = students.Id_Kelas')
		->join('jurusans','jurusans.id = students.Id_Jurusan')
		->join('jeniskelamins','jeniskelamins.id = students.id_jeniskelamin');
		$query   	= $builder->get()->getResult();

		$kelas = new KelasModel();
		$jurusan = new JurusanModel();

		$data =[
		'Nomor_Induk' => $this->request->getPost('Nomor_Induk'),
		'Nama' => $this->request->getPost('Nama'),
		'Password' => $this->request->getPost('Password'),
		'Id_Kelas' => $this->request->getPost('kelas'),
		];
		
		$this->db->table('students')->insert($data);

		if ($this->db->affectedRows() > 0) {
			return redirect()->to(base_url('kelola_siswa'))->with('success','Data Berhasil Disimpan');
		}
	}

	public function edit($id= null)
	{
		if ($id != null) {
			$query = $this->db->table('students')->getWhere(['Nomor_Induk'=>$id]);
			if ($query->resultID->num_rows > 0) {
				$data['admin'] = $query->getRow();
				return view('admin/edit_siswa', $data);
			}else{
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		}else{
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function update($id)
	{
		$data = $this->request->getPost();
		unset($data['_method']);

		$this->db->table('students')->where(['Nomor_Induk'=>$id])->update($data);
		return redirect()->to(base_url('kelola_siswa'))->with('success','Data Berhasil Di Ubah');

	}
	public function destroy($id)
	{
		$this->db->table('students')->where(['Nomor_Induk'=>$id])->delete();
		return redirect()->to(base_url('kelola_siswa'))->with('success','Data Berhasil Di Hapus');

	}
}
