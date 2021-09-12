<?php

namespace App\Controllers;
use DB;
use App\Models\KelasModel;
use App\Models\JurusanModel;
use App\Models\JeniskelaminModel;
use App\Models\HomeModel;
use App\Models\SiswaModel;
use App\Models\ChatModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->homemodel = new HomeModel();
		$this->siswam = new SiswaModel();
		$this->chatmodel = new ChatModel();
	}
	

	public function index()
	{
		$modelchart = new HomeModel();
		$db      = \Config\Database::connect();
		$builder = $db->table('students'); 
		$builder2 = $db->table('chat_bot');
	
		$siswachart = $builder->select('YEAR(created_at) AS tahun, COUNT(id) AS jumlah')
								->groupBy('MONTH(created_at)')
								->get();

		$chartintent = $builder2->select('MONTH(created_at) AS bulan, COUNT(id) AS jumlah')
								->groupBy('MONTH(created_at)')
								->get();

		$data =[
		'title' => 'Home',
		'total_siswa'=> $this->homemodel->total_siswa(),
		'total_admin'=> $this->homemodel->total_admin(),
		'siswa' => $siswachart,
		'topintent' => $this->topintent(), 
		'total_percakapan'=> $this->homemodel->total_percakapan(),
		'total_guru' => $this->homemodel->total_guru(),
		'isi' => 'home',
		];
	

		echo view('adminLte/wraper',$data);

	}
	private function topintent()
	{
		$modelChart = $this->homemodel->TopIntent();
		$intentChart = ["group"=>[], "data"=>[]];

		// $pie = array(
		// 	"group"=>array(),
		// 	"data"=>array()
		// );
	
			foreach ($modelChart as $value)
			{
			   array_push($intentChart["group"], $value["intent"] );
			   array_push($intentChart["data"], $value["count(1)"]);
			}
	   
		return $intentChart;
	}



	public function kelola_siswa()
	{
		$db  = \Config\Database::connect();
		
		$builder 	= $db->table('students')
		->join('kelas','kelas.id = students.Id_Kelas')
		->join('jurusans','jurusans.id = students.Id_Jurusan')
		->join('jeniskelamins','jeniskelamins.id = students.id_jeniskelamin');
		$query   	= $builder->get()->getResult();

		echo view ('admin/kelola_siswa', compact('query'));
	}

	public function create()
	{
		$kelas = new KelasModel();
		$jurusan = new JurusanModel();
		$jeniskelamin = new JeniskelaminModel();
		$data['kelasid']= $kelas->findAll();
		$data['jurusanid']= $jurusan->findAll();
		$data['jeniskelaminid']= $jeniskelamin->findAll();
		return view('admin/tambah_siswa', $data);
	}
	public function store()
	{
		
		$kelas = new KelasModel();
		$jurusan = new JurusanModel();

		$data =[
		'Nomor_Induk' => $this->request->getPost('Nomor_Induk'),
		'Nama' => $this->request->getPost('Nama'),
		'Password' => $this->request->getPost('Password'),
		'Id_Kelas' => $this->request->getPost('kelas'),
		'Id_Jurusan' => $this->request->getPost('jurusan'),
		'id_jeniskelamin' => $this->request->getPost('jeniskelamin'),
		];
		
		$this->db->table('students')->insert($data);

		if ($this->db->affectedRows() > 0) {
			return redirect()->to(base_url('kelola_siswa'))->with('success','Data Berhasil Disimpan');
		}
	}

	public function edit($id= null)
	{
		if ($id != null) {
			$query = $this->db->table('students')->getWhere(['Nomor_Induk'=>$id]);
			if ($query->resultID->num_rows > 0) {
				$data['admin'] = $query->getRow();
				return view('admin/edit_siswa', $data);
			}else{
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		}else{
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function update($id)
	{
		$data = $this->request->getPost();
		unset($data['_method']);

		$this->db->table('students')->where(['Nomor_Induk'=>$id])->update($data);
		return redirect()->to(base_url('kelola_siswa'))->with('success','Data Berhasil Di Ubah');

	}
	public function destroy($id)
	{
		$this->db->table('students')->where(['Nomor_Induk'=>$id])->delete();
		return redirect()->to(base_url('kelola_siswa'))->with('success','Data Berhasil Di Hapus');

	}


}
