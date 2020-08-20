<?php namespace App\Validation;

use App\Models\UserModel;

class UserRules {

    public function validateUser(string $str, string $fields, array $data): bool {
        $model = new UserModel();
        $user = $model->where('email', $data['email'])->first();
        if (!$user) {
            return false;
        }
        return password_verify($data['password'], $user['password']);
    } 
}