<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\LoginModel;
use DB;

class Apilogin extends ResourceController{

	
	public function index()

	{
		$this->load->view('welcome_message');
	}
    
	public function Login()
	{
		$nisn = $this->request->getPost('Nomor_Induk');
		$password = $this->request->getPost('Password');

		$validation = \Config\Services::validation();

		$params = [
			'Nomor_Induk' => $nisn,
			'Password' => $password
		];


        if ($validation->run($params, 'Apilogin')== false) {

			$response = [
				'sukses' => false,
				'status' => 0,
				'pesan' => 'Masukan Nomor Induk atau Password',
				
			];
			return $this->respond($response,500);
			
        }
		

		$model = new LoginModel();
		$siswa = $model->signin($nisn, $password);
		
        
		if ($siswa) {
			$response = [
				'sukses' => true,
				'status' => 1,
				'pesan' => 'Login Berhasil',
				'login' => $model->signin($nisn, $password)
			];
			return $this->respond($response,200);
		}else {
			$response = [
				'sukses' => false,
				'status' => 0,
				'pesan' => 'Nomor Induk atau Password Salah',
				
			];
			return $this->respond($response,500);
		}
	}
}

