<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
  public function login()
  {
    helper('form');
    return view('auth/login');
  }

  public function loginCheck()
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
          'user_id' => $user['user_id'],
          'username' => $user['username'],
          'logged_in' => TRUE
        ];

        $session->set($ses_data);
        return redirect()->to('home/index');
      } else {
        $session->setFlashdata('error', 'Password yang anda masukkan salah!');
        return redirect()->to('auth/login');
      }
    } else {
      $session->setFlashdata('error', 'Username yang anda masukkan salah!');
      return redirect()->to('auth/login');
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('auth/login');
  }
}
