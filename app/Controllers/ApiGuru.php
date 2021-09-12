<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\GuruModel;
use App\Models\ProfileModel;
use DB;

class ApiGuru extends ResourceController
{
	
    protected $format = 'json';
    protected $modelname = 'App\Models\GuruModel';

    public function _construct()
    {
        $this->guru = new GuruModel();
    }
	public function index($id = null)
	{
		
		
        // return $this->respond($data,200);
       
		// return view('guru/index',$data);
	}
	public function getGuru()
	{

		$nisn = $this->request->getPost('Nomor_Induk');
		$validation = \Config\Services::validation();

		$params = [
			'Nomor_Induk' => $nisn
		];

		$model = new ProfileModel();
		$siswaLogin = $model->detail_siswa($nisn);

		if ($siswaLogin) {
			$response['sukses'] = true;
            $response['status'] = 1;
			$response['pesan'] = 'Data Ditemukan';
            $response['siswa'] = $model->detail_siswa($nisn);
			return $this->respond($response,200);
		}else{
			$response['sukses'] = false;
            $response['status'] = 0;
			$response['pesan'] = 'data tidak ditemukan';
			return $this->respond($response,500);
       
		}
	}

	public function getGuruAll()
	{

		$validation = \Config\Services::validation();


		$model = new GuruModel();



        if ($model != null) {
			$response['sukses'] = true;
            $response['status'] = 1;
			$response['pesan'] = 'Data Ditemukan';
            $response['guru'] = $model->findAll();
			return $this->respond($response,200);

        }else {
            $response['sukses'] = false;
            $response['status'] = 0;
			$response['pesan'] = 'Data tidak ditemukan';
			return $this->respond($response,500);
        }
	}
	

    
	public function show($id = null)
	{
		//
	}

	
	public function new()
	{
		return view('guru/tambah');
	}

	
	public function create()
	{
		$model = new GuruModel();
		$data = $this->request->getPost();
		$model->insert($data);
		return redirect()->to(base_url('Guru'))->with('success','Data Berhasil Disimpan');
	}

	
	public function edit($id = null)
	{
		//
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
		//
	}
}
