<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\JenisKelaminModel;
use App\Models\JurusanModel;



class Siswa extends ResourceController
{
	public function __construct()
	{
		$pager = \Config\Services::pager();
		$model = new SiswaModel();
	}

	public function index()
	{
		$pageUrut = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
		$model = new SiswaModel();
	
		$cari = $this->request->getVar('cari');
		if ($cari) {
			$carisiswa =$model->search($cari);
		}else{
			$carisiswa = $model;
		}

		
		$kelas = new KelasModel();
		$jurusan = new JurusanModel();
		$jk = new JeniskelaminModel();

		$data['siswa']= $model->select('students.id, Nama, Nomor_Induk, Password, kelas_id, jurusan_id, jeniskelamin_id, kelas, Jurusan, jeniskelamin')
							  ->orderBy('id','asc')
							  ->join('kelas','kelas.id = students.kelas_id')
							  ->join('jurusans', 'jurusans.id = students.jurusan_id')
							  ->join('jeniskelamins','jeniskelamins.id = students.jeniskelamin_id')
							   ->paginate(5);
		$data['pager'] = $model->pager;
		$data['pageurut'] = $pageUrut;
		
		return view('siswa/index', $data);
	}

	
	public function show($id = null)
	{
		//
	}

	
	public function new()
	{
		$siswa = new SiswaModel();
		$kelas = new KelasModel();
		$jurusan = new JurusanModel();
		$jk = new JenisKelaminModel();

		$data= [
			'siswa' => $siswa->findAll(),
			'kelas'=> $kelas->findAll(),
			'jurusan'=>$jurusan->findAll(),
			'jeniskelamin'=> $jk->findAll()
		];
		return view('siswa/tambah', $data);
	}

	public function create()
	{
		//
	}

	public function edit($id = null)
	{
		$model = new SiswaModel();
		$kelas = new KelasModel();
		$jurusan = new JurusanModel();
		$jk = new JenisKelaminModel();
		$data = [
			'admin' => $model->where('Nomor_Induk', $id)->first(),
			'kelasid'=>$kelas->findAll(),
			'jurusan'=>$jurusan->findAll(),
			'jeniskelamin'=>$jk->findAll()
			
		];
		

		return view('siswa/edit_data',$data);
	}

	public function update($id = null)
	{
		$model = new SiswaModel();
		$data = $this->request->getPost();
		$model->update($id,$data);

		return redirect()->to(base_url('siswa'))->with('success','Data Berhasil Diubah');	
	}

	public function delete($id = null)
	{
		$model = new SiswaModel();
		
		$model->delete($id);

		return redirect()->to(base_url('Siswa'))->with('success','Data Berhasil DiHapus');	
	}
}
