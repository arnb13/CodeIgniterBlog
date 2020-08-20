<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = "user";
    protected $primaryKey = "id";
    protected $allowedFields = ["name", "email", "password"];
    protected $beforeInsert = ["beforeInsert"];
    protected $beforeUpdate = ["beforeUpdate"];

    public function beforeInsert(array $data) {
        $data = $this->passwordHash($data);
        return $data;
    }

    public function beforeUpdate(array $data) {
        $data = $this->passwordHash($data);
        return $data;
    }

    public function passwordHash(array $data) {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function getUser ($email) {

        return $this->asArray()
                    ->where(['email' => $email])
                    ->first();
    }
}