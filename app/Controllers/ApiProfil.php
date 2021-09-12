<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use DB;

class ApiProfil extends BaseController
{
	protected $format = 'json';
    protected $modelname = 'App\Models\ProfileModel';


    public function SiswaNISN()
    {
        $model = new ProfileModel();
		$nisn = $this->request->getPost('Nomor_Induk');
		
		$params = [
			'Nomor_Induk' => $nisn
		];


        if ($nisn) {
			$response['sukses'] = true;
            $response['status'] = 1;
			$response['pesan'] = 'Data Ditemukan';
            $response['siswa'] = $model->detail_siswa($nisn);
			return $this->respond($response,200);

        }else {
            $response['sukses'] = false;
            $response['status'] = 0;
			$response['pesan'] = 'Data tidak ditemukan';
			return $this->respond($response,500);
        }

    }

}
