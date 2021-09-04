<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ChatModel;
use DB;

class ApiChat extends ResourceController
{
	
    protected $format = 'json';
    protected $modelname = 'App\Models\ChatModel';

    public function __construct()
    {
        $this->mchat = new ChatModel();
        $db  = \Config\Database::connect();
    }
	public function index($id = null)
	{
        // return $this->respond($data,200);   
		// return view('guru/index',$data);
	}
	public function tambahpesan()
	{
        
		$pesanuser = $this->request->getPost('pesan_chat');
        $pesanbot = $this->request->getPost('response_pesan');

		$data = [
            'pesan_chat'=>$pesanuser,
            'response_pesan'=>$pesanbot,
		];


        if ($data != null) {
			$response['sukses'] = true;
            $response['status'] = 1;
			$response['pesan'] = 'Data Berhasil disimpan';
            $response['id_chat'] = $this->mchat->insert($data);
			return $this->respond($response,200);

        }else {
            $response['sukses'] = false;
            $response['status'] = 0;
			$response['pesan'] = 'Data gagal disimpan';
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
