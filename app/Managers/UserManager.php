<?php

namespace App\Managers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserManager {

    public function find(int $id) {
        return User::find($id);
    }

    public function getAll() {
        return User::get();
    }

    public function create(array $data) {
        if(isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return User::create($data);
    }

    public function update(int $id, array $data) {
        $user = $this->find($id);
        if(isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);

        return $user;
    }

    public function delete(int $id) {
        $user = $this->find($id);

        return $user->delete();
    }

}
