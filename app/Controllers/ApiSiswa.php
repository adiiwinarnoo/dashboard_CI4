<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\GuruModel;

class ApiSiswa extends \CodeIgniter\Controller
{
    use ResponseTrait;

    public function tampildata()
    {
        $idguru = $this->request->getPost('id_guru');

        $model = new GuruModel();
        $guru  = $model->detail_guru($idguru);

        
        return $this->respond($guru,200);
    }
}