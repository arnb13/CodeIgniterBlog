<?php namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController
{
	public function index()
	{
		return view('welcome_message');
    }

    public function signup() {
        if (!session()->get('is_logged_in')) {
            $data = [];
            helper("form");

            if ($this->request->getMethod() == "post") {
                $rules = [
                    'name' => 'required|min_length[3]|max_length[255]',
                    'email' => 'required|valid_email|is_unique[user.email]',
                    'password' => 'required|min_length[6]|max_length[255]',
                    'confirm_password' => 'matches[password]'
                ];
                if(!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    $model = new UserMOdel();
                    $userData = [
                        "name"=> $this->request->getVar("name"),
                        "email"=> $this->request->getVar("email"),
                        "password"=> $this->request->getVar("password")
                    ];

                    $model->save($userData);
                    $session = \Config\Services::session();
                    $session->setFlashdata('success', 'New user created successfully! Please login to continue.');
                    return redirect()->to("/blog/public/user/login");
                }
            }
            echo view('templates/header', $data);
            echo view('pages/signup');
            echo view('templates/footer');
        } else {
            return redirect()->to("/blog/public/home");
        }
    }
    
    public function login() {
        if (!session()->get('is_logged_in')) {
            $data = [];
            helper("form");
        
            if ($this->request->getMethod() == "post") {
                $rules = [
                    'email' => 'required|valid_email',
                    'password' => 'required|validateUser[email, password]'
                ];

                $errors = [
                    'password' => [
                        'validateUser' => 'Email or password do not match!'
                    ]
                ];
                if(!$this->validate($rules, $errors)) {
                    $data['validation'] = $this->validator;
                } else {
                    $model = new UserModel();
                    $user = $model->where('email', $this->request->getVar('email'))->first();

                    $this->setUser($user);
                    $session = \Config\Services::session();
                    $session->setFlashdata('success', 'Login successful!');
                    return redirect()->to("/blog/public/home");
                }
            }
            echo view('templates/header', $data);
            echo view('pages/login');
            echo view('templates/footer');

        } else {
            return redirect()->to("/blog/public/home");
        }
    }

    private function setUser($user) {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'is_admin' => $user['is_admin'],
            'is_logged_in' => true
        ];
        session()->set($data);
        return true;
    }

    public function logout() {
        session()->destroy();
        $session = \Config\Services::session();
        $session->setFlashdata('success', 'Logout successful!');
        return redirect()->to("/blog/public/home");
        
    }

    public function profile() {
        if (session()->get('is_logged_in')) {
            echo view('templates/header');
            echo view('pages/profile');
            echo view('templates/footer');

        } else {
            return redirect()->to("/blog/public/home");
        }
    }

    public function updateProfile() {
        if (session()->get('is_logged_in')) {
            $data = [];
            helper("form");

            if ($this->request->getMethod() == "post") {
                $rules = [
                    'name' => 'required|min_length[3]|max_length[255]',
                ];
                if(!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else { 
                    $model = new UserMOdel();
                    $userData = [
                        "id" => session()->get('id'),
                        "name"=> $this->request->getVar("name"),
                    ];

                    $model->save($userData);
                    $session = \Config\Services::session();
                    $user = $model->find(session()->get('id'));
                    $this->setUser($user);
                    $session->setFlashdata('success', 'Profile updated successfully!');
                    return redirect()->to("/blog/public/user/profile");
                }
            }
            echo view('templates/header');
            echo view('pages/updateProfile');
            echo view('templates/footer');
        } else {
            return redirect()->to("/blog/public/home");
        }
    }

    public function changePassword() {
        if (session()->get('is_logged_in')) {
            $data = [];
            helper("form");
        
            if ($this->request->getMethod() == "post") {
                $rules = [
                    'email' => 'required',
                    'password' => 'required|validateUser[email, password]',
                    'new_password' => 'required|min_length[6]|max_length[255]',
                    'confirm_password' => 'matches[new_password]'
                ];

                $errors = [
                    'password' => [
                        'validateUser' => 'Old password do not match!'
                    ]
                ];
                if(!$this->validate($rules, $errors)) {
                    $data['validation'] = $this->validator;
                } else {
                    $model = new UserModel();
                    $userData = [
                        "id" => session()->get('id'),
                        "password"=> $this->request->getVar("new_password"),
                    ];
                    $model->save($userData);
                    $session = \Config\Services::session();
                    $session->setFlashdata('success', 'Password changed successfully!');
                    return redirect()->to("/blog/public/user/profile");
                }
            }
            echo view('templates/header', $data);
            echo view('pages/changePassword');
            echo view('templates/footer');
        } else {
            return redirect()->to("/blog/public/home");
        }
    }
}
