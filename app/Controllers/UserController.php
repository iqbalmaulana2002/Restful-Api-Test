<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\User;

class UserController extends ResourceController
{
    public $user;

    function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $user = $this->user->findAll();
        return $this->respond([
            "message" => "List Users",
            "data" => $user
        ]);
    }

    public function getUserByName($name)
    {
        $user = $this->user->where('name', $name)->findAll();
        if (!$user) return $this->failNotFound("User Not Found");

        return $this->respond([
            "message" => "User with Name: $name",
            "data" => $user
        ]);
    }

    public function getUserById($id)
    {
        $user = $this->user->find($id);
        if (!$user) return $this->failNotFound('User Not Found');

        return $this->respond([
            "message" => "User with ID: $id",
            "data" => $user
        ]);
    }

    public function update($id = null)
    {
        $user = $this->user->find($id);
        if (!$user) return $this->failNotFound('User Not Found');

        helper(['form']);
        $rules = [
            'username' => "required|is_unique[users.username,id,{$user['id']}]",
            'konfirmasi_password' => 'matches[password]',
            'email' => "required|valid_email|is_unique[users.email,id,{$user['id']}]",
        ];

        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $this->user->update($id, [
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getVar('email')
        ]);

        return $this->respond([
            "message" => "User Updated",
            "data" => $this->user->find($id)
        ]);
    }

    public function delete($id = null)
    {
        $user = $this->user->find($id);
        if (!$user) return $this->failNotFound('User Not Found');

        $this->user->delete($id);

        return $this->respond([
            "message" => "User Deleted",
            "data" => $user
        ]);
    }
}