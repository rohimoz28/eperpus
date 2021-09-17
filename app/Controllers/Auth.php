<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        helper('form');
        return view('auth/index');
    }

    public function login()
    {
        $session = session();
        $this->user = new UserModel();

        $user = $this->request->getVar('username');
        $pass = $this->request->getVar('password');

        $user = $this->user->where('username', $user)->first();
        // Cek username
        if ($user) {
            $verify_pass = $user['password'];
            // Cek password
            if ($verify_pass == $pass) {
                $ses_data = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'logged_in' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to('home/index');
            } else {
                $session->setFlashdata('error', 'Password salah');
                return redirect()->to('auth/index');
            }
        } else {
            $session->setFlashdata('error', 'Email salah!');
            return redirect()->to('auth/index');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('auth/index');
    }
}
