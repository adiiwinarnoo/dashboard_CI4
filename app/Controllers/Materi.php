<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use App\Models\MateriModel;

class Materi extends ResourcePresenter
{

	function _construct()
	{
		// $this->omateri= new MateriModel();
	}

	public function index()
	{
		$model = new MateriModel();
		$data['materis'] = $model->getMateri();
		
		return view('materi/index', $data);
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
		return view('materi/tambah');
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
		$data = $this->request->getPost();
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
		$data['materis'] = $model->where('id',$id)->first();

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
