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

    public function barang()
    {

        $model = new M_model();
        $data['dt'] = $model->tampil('barang');
        echo view ('header');
        echo view ('menu');
        echo view ('barang', $data);
        echo view ('footer');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('home/login');
    }

    public function barang_masuk()
    {
        $model = new M_model();
        $on = ('barang_masuk.id_barang = barang.id_barang');
        $data['dt'] = $model->join('barang_masuk' , 'barang', $on);
        echo view ('header');
        echo view ('menu');
        echo view ('barang_masuk', $data);
        echo view ('footer');
    }

    public function tambah_barang()
    {
        $model = new M_model();
        $data['dt'] = $model->tampil('barang');
        echo view ('header');
        echo view ('menu');
        echo view ('tambah_barang', $data);
        echo view ('footer');
    }

    public function i_b()
    {
        $model = new M_model();
        $a = $this->request->getPost('nama_barang');
        $b = $this->request->getPost('kode_barang');
        $c = $this->request->getPost('harga');
        $d = $this->request->getPost('stok');

        $data = array(
            'nama_barang' => $a,
            'kode_barang'=> $b,
            'harga'=> $c,
            'stok'=> $d,
            'tanggal' => date('Y-m-d H:i:s')
        );

        $model->simpan('barang' , $data);
        return redirect()->to('home/barang');
    }

    public function i_bm()
    {
        $model = new M_model();
        $a = $this->request->getPost('nam_barang');
        $b = $this->request->getPost('kode_barang');
        $c = $this->request->getPost('harga');
        $d = $this->request->getPost('stok');

        $data = array(
            'nama_barang' => $a,
            'kode_barang'=> $b,
            'harga'=> $c,
            'stok'=> $d,
            'tanggal' => date('Y-m-d H:i:s')
        );

        $model->simpan('barang' , $data);
        return redirect()->to('home/barang');
    }

    public function tambah_barang_masuk()
    {
        $model = new M_model();
        $data['dt'] = $model->tampil('barang_masuk');
        echo view ('header');
        echo view ('menu');
        echo view ('tambah_barang_masuk');
        echo view ('footer');
    }


}
