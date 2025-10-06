<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Users extends Controller
{
    protected $userModel;
    protected $helpers = ['url', 'form'];

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
    }

    public function index()
    {
        $data['users'] = $this->userModel->orderBy('id', 'DESC')->findAll();
        echo view('users/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name'  => 'required|min_length[2]|max_length[100]',
                'email' => 'required|valid_email|is_unique[users.email]'
            ];
            if (! $this->validate($rules)) {
                return view('users/form', ['validation' => $this->validator]);
            }
            $this->userModel->insert([
                'name'  => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
            ]);
            return redirect()->to('/users')->with('msg', 'Added successfully');
        }
        echo view('users/form');
    }

    public function edit($id = null)
    {
        if ($id === null) return redirect()->to('/users');

        $user = $this->userModel->find($id);
        if (! $user) return redirect()->to('/users')->with('error', 'User not found');

        if ($this->request->getMethod() === 'post') {
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');

            $rules = ['name' => 'required|min_length[2]|max_length[100]'];
            if ($email !== $user['email']) {
                $rules['email'] = 'required|valid_email|is_unique[users.email]';
            } else {
                $rules['email'] = 'required|valid_email';
            }

            if (! $this->validate($rules)) {
                return view('users/form', ['validation' => $this->validator, 'user' => $user]);
            }

            $this->userModel->update($id, ['name' => $name, 'email' => $email]);
            return redirect()->to('/users')->with('msg', 'Updated successfully');
        }

        echo view('users/form', ['user' => $user]);
    }

    public function delete($id = null)
    {
        if ($id === null) return redirect()->to('/users');
        $this->userModel->delete($id);
        return redirect()->to('/users')->with('msg', 'Deleted successfully');
    }
}
