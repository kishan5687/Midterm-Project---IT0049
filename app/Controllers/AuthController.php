<?php
namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController {
    public function login() {
        return view('auth/login');
    }

    public function loginProcess() {
        $session = session();
        $model = new UserModel();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $user = $model->where('username', $username)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'full_name' => $user['full_name'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/');
        } else {
            return redirect()->to('/login')->with('error', 'Invalid username or password.');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}
