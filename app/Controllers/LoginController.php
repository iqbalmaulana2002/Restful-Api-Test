<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;
use Firebase\JWT\JWT;
use App\Models\User;

class LoginController extends ResourceController
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
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $model = new User();
        $user = $model->where('username', $this->request->getVar('username'))->first();
        if (!$user) return $this->failNotFound('Username Not Found');

        $verify = password_verify($this->request->getVar('password'), $user['password']);
        if (!$verify) return $this->fail('Wrong Password');

        $secret_key = getenv('SECRET_KEY');

        $iat = Time::now('Asia/Jakarta', 'id_ID')->timestamp;
        $nbf = $iat + 10;
        $exp = $iat + 3600;
        $payload = [
            "iss" => "THE CLAIM",
            "aud" => "THE AUDIENCE",
            "iat" => $iat,
            "nbf" => $nbf,
            "exp" => $exp,
            "uid" => $user['id'],
            "email" => $user['email']
        ];

        $token = JWT::encode($payload, $secret_key);
        $user['token'] = $token;

        return $this->respond([
            "message" => "Login Successfully",
            "data" => $user
        ]);
    }

}