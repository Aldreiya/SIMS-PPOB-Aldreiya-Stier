<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }
    public function index()
    {
        return view('home/home');
    }
    public function topup()
    {
        return view('home/topup');
    }
    public function transaction()
    {
        return view('home/transaction');
    }
    public function akun()
    {
        return view('home/akun');
    }
    public function services($id)
    {

        $img = $this->request->getPost('img');
        $code = $this->request->getPost('code');
        $tariff = $this->request->getPost('tariff');
        $name = $this->request->getPost('name');

        $sessLogin = [
            'img' => $img,
            'code' => $code,
            'tariff' => $tariff,
            'name' => $name,
        ];
        $this->session->set($sessLogin);
        return 0;
        // return $this->response->setJSON();
        // return view('home/pembayaran');
        // return redirect()->to('services');
        // return redirect()->to(site_url('services'));
    }
    
    public function service()
    {
        return view('home/pembayaran');
    }
}
