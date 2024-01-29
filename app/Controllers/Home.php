<?php

namespace App\Controllers;
use App\Models\M_model;


class Home extends BaseController
{
    public function index()
    {
        if(session()->get('id') > 0)
        {
        echo view ('header');
        echo view ('menu');
        echo view ('dashboard');
        echo view ('footer');
        }else {
            return redirect()->to('home/login');
        }
    }

    public function login()
    {
        echo view ('login');
    }

    public function aksi_login()
    {
        $u=$this->request->getPost('username');
		$p=$this->request->getPost('password');
		$model= new M_model();
		$data=array(
			'username'=>$u,
			'password'=>md5($p)

		);
		$cek=$model->getWhere2('user', $data);
		if ($cek > 0) {
			session()->set('id', $cek['id_user']);
			session()->set('username', $cek['username']);
			session()->set('level', $cek['level']);
			return redirect()->to('Home/dashboard');
		}else {
			return redirect()->to('home/login');
		}
    }

    public function dashboard()
    {
        echo view ('header');
        echo view ('menu');
        echo view ('dashboard');
        echo view ('footer');
    }

    public function user()
    {
        $model = new M_model();
        $data['dt'] = $model->tampil('user');
        echo view ('header');
        echo view ('menu');
        echo view ('user', $data);
        echo view ('footer');
    }
}
