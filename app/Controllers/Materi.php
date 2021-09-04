<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use App\Models\MateriModel;
use App\Models\KelasModel;

class Materi extends ResourcePresenter
{

	public function __construct()
	{
		// $this->omateri= new MateriModel();
		$this->materimodel = new MateriModel();
	}

	public function index()
	{
	
		$model = new MateriModel();
		$kelas = new KelasModel();
		$data['materis'] = $model->findAll();
	
		
		return view('materi/index',$data);
	}

	/**
	 * Present a view to present a specific resource object
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		//
	}

	/**
	 * Present a view to present a new single resource object
	 *
	 * @return mixed
	 */
	public function new()
	{
		$kelas = new KelasModel();
		$data['kelasid']= $kelas->findAll();	
		return view('materi/tambah', $data);
	}

	/**
	 * Process the creation/insertion of a new resource object.
	 * This should be a POST.
	 *
	 * @return mixed
	 */
	public function create()
	{
		$model = new MateriModel();
		$data =[
			'nama_pelajaran'=>$this->request->getPost('nama_pelajaran'),
			'id_kelas' =>$this->request->getPost('kelas'),
			'link' =>$this->request->getPost('link'),
		];
		
		$model->insert($data);

		return redirect()->to(base_url('Materi'))->with('success','Data Berhasil Disimpan');		

	}

	/**
	 * Present a view to edit the properties of a specific resource object
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{

		$model = new MateriModel();
		$kelas = new KelasModel();
		$data = [
			'materiedit' => $model->where('id', $id)->first(),
			'kelasid' => $kelas->findAll()
		];

		return view('materi/edit',$data);
	}

	/**
	 * Process the updating, full or partial, of a specific resource object.
	 * This should be a POST.
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		$model = new MateriModel();
		$data = $this->request->getPost();
		$model->update($id,$data);

		return redirect()->to(base_url('Materi'))->with('success','Data Berhasil Diubah');	
	}

	/**
	 * Present a view to confirm the deletion of a specific resource object
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function remove($id = null)
	{
		//
	}

	/**
	 * Process the deletion of a specific resource object
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		$model = new MateriModel();
		
		$model->delete($id);

		return redirect()->to(base_url('Materi'))->with('success','Data Berhasil DiHapus');	
	}
}
