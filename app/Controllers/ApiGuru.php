<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\GuruModel;
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

		$guruid = $this->request->getPost('id_guru');
		$validation = \Config\Services::validation();


		$model = new GuruModel();

		$params = [
			'id_guru' => $guruid
		];


        if ($guruid != null) {
			$response['sukses'] = true;
            $response['status'] = 1;
			$response['pesan'] = 'Data Ditemukan';
            $response['guru'] = $model->detail_guru($guruid);
			return $this->respond($response,200);

        }else {
            $response['sukses'] = false;
            $response['status'] = 0;
			$response['pesan'] = 'Data tidak ditemukan';
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
