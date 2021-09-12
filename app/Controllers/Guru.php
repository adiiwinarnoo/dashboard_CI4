<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use App\Models\GuruModel;
use App\Models\Mapel;
use App\Models\KelasModel;
use App\Models\JenisKelaminModel;


class Guru extends ResourcePresenter
{
	public function __construct()
	{
		helper('form');
		$this->model = new GuruModel();
		
	}
	
	public function index()
	{

		$model = new GuruModel();
		$cari = $this->request->getVar('cari');
		if ($cari) {
			$carisiswa =$model->search($cari);
		}else{
			$carisiswa = $model;
		}
		$pageUrut = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
		$data['gurus'] = $model->select('guru.id, Nama, Nomor_Induk, photo, kelas, jeniskelamin, Pelajaran')
							   ->orderBy('id','asc')
							   ->join('dtl_guru','dtl_guru.id = guru.guru_id')
							   ->join('kelas','kelas.id = guru.kelas_id')
							   ->join('jeniskelamins','jeniskelamins.id= guru.jeniskelamin_id')
							   ->paginate(5);
		$data['pager']= $model->pager;
		$data['pageurut'] = $pageUrut;
		
		return view('guru/index',$data);

		// if (!$this->validate([]))
        // {
        //     $data['validation'] = $this->validator;
        //     $data['gurus'] = $this->model->GuruAll();
        //     return view('guru/index', $data);
        // }
	}

	
	public function show($id = null)
	{
		//
	}

	
	public function new()
	{
		$mapel = new Mapel();
		$kelas = new KelasModel();
		$jeniskelamin = new JeniskelaminModel();
		$data=[
			'mapel' => $mapel->findAll(),
			'kelasguru' => $kelas->findAll(),
			'jeniskelaminguru' => $jeniskelamin->findAll(),
			
		];
		return view('guru/tambah', $data);
	}

	public function create()
	{
		// $model = new GuruModel();
		// $data = $this->request->getPost();
		// $model->insert($data);
		// return redirect()->to(base_url('Guru'))->with('success','Data Berhasil Disimpan');

		if ($this->request->getMethod() !== 'post') {
			return redirect()->to(base_url('Guru'));
		}

		$validation = $this->validate([
			'photo'=> 'uploaded[photo]|mime_in[photo,image/jpg,image/png,image/jpeg]|max_size[photo,10000]'
		]);

		if ($validation == FALSE) {
			return redirect()->to(base_url('Guru'))->with('error','Data Gagal Ditambah');	
		}else{
			
			$gambarfile = $this->request->getFile('photo');
			$gambarfile->move(WRITEPATH. '../public/photo');
			$data=[
				'guru_id' => $this->request->getPost('Pelajaran'),
				'Nama' =>$this->request->getPost('Nama') ,
				'Nomor_Induk' => $this->request->getPost('Nomor_Induk'),
				'kelas_id' =>$this->request->getPost('kelas'),
				'jeniskelamin_id' => $this->request->getPost('jeniskelamin'),
				'photo' => $gambarfile->getName()
			];
			$this->model->GetPhoto($data);
			return redirect()->to(base_url('Guru/index'))->with('success','Data Berhasil Diupload !!!');
		}
	}


	public function edit($id = null)
	{
		$model = new GuruModel();
		$mapel = new Mapel();
		$kelas = new KelasModel();
		$jk = new JenisKelaminModel();

		$data = [
			'guruedit'=> $model->where('id', $id)->first(),
			'pelajaran' => $mapel->findAll(), 
			'kelas' => $kelas->findAll(),
			'jk' => $jk->findAll(),
			
			
		];
		return view('guru/edit', $data);
	}

	
	public function update($id = null)
	{
		//
	}

	
	public function remove($id = null)
	{
		//
	}

	
	public function delete($id = null)
	{
		$model = new GuruModel();
		$model->delete($id);
		return redirect()->to(base_url('Guru'))->with('success','Data Berhasil DiHapus');	
	}



}
