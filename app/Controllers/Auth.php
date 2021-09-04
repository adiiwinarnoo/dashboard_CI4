<?php

namespace App\Controllers;
use DB;

class Auth extends BaseController
{
	public function index()
	{
		return view('auth/login');
	}

    public function login()
    {
        if (session('id')) {
            return redirect()->to(base_url('home'));
        }
        return view('auth/login');
    }
    public function loginProses()
    {
        $post = $this->request->getPost();
        $query = $this->db->table('admin')->getWhere(['nomor_induk'=> $post['nomor_induk']]);
        $admin = $query->getRow();

        if ($admin) {
            if (password_verify($post['password'], $admin->password)) {
                $params = ['id' => $admin->id, 'nama' => $admin->nama];
                session()->set($params);

                return redirect()->to(base_url('home'));
            }else{
                return redirect()->back()->with('error', 'password salah, silahkan masukan password yang benar');
            }
            
        }else{
            return redirect()->back()->with('error', 'nomor induk tidak ditemukan, silahkan masukan yang benar');
        }
    }

    public function logout()
    {
        session()->remove('id');
        return redirect()->to(base_url('login'));
    }
}
