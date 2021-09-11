<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\User;

class RegisterController extends ResourceController
{

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        helper(['form']);
        $rules = [
            'name' => 'required',
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[7]',
            'konfirmasi_password' => 'matches[password]',
            'email' => 'required|valid_email|is_unique[users.email]',
        ];

        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $data = [
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getVar('email'),
        ];

        $user = new User();
        $register = $user->insert($data);
        if (!$register) {
            return $this->fail([
                'status' => 400,
                'message' => 'New user failed to register'
            ]);
        }
        return $this->respondCreated([
            'status' => 201,
            'message' => 'New user registered successfully'
        ]);
    }

}