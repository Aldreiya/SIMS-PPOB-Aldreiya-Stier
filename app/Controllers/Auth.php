<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }
    public function login()
    {
        return view('auth/login');
    }
    public function valid_login()
    {
        $curl = curl_init();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://take-home-test-api.nutech-integrasi.app/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "email":"'.$email.'",
                "password":"'.$password.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($response, true);

        if($res['status']==0){
            $sessLogin = [
                'isLogin' => true,
                'token' => $res['data']['token'],
            ];
            $this->session->set($sessLogin);
        }
        return $this->response->setJSON($res);
    }
    public function register()
    {
        return view('auth/register');
        // $data = array(
        //     'email'=> $this->request->getPost('email'),
        //     'first_name'=> $this->request->getPost('first_name'),
        //     'last_name'=> $this->request->getPost('last_name'),
        //     'password'=> $this->request->getPost('password'),
        // );
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect('login');
    }
}
