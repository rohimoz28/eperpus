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

    $user = $this->user->where('username', $user)
      ->where('password', $pass)
      ->first();

    // Cek login 
    if ($user) {
      $name = $user['username'];
      $role = $user['role'];

      $data = [
        'username' => $name,
        'role' => $role,
        'logged_in' => TRUE
      ];
      // Set session
      $session->set($data);
      // cek user role
      // role admin
      if ($role == 1) {
        return redirect()->to('home');
      } else {
        // role user
        return redirect()->to('borrow');
      }
    } else {
      // gagal login || wrong username or password
      return redirect()->back()->with('error', 'username atau password salah!');
    }
  }

  public function error()
  {
    echo view('auth/error');
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('auth/login');
  }
}
