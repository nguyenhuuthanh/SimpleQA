<?php


namespace App\Repositories;


use App\User;
use Bosnadev\Repositories\Eloquent\Repository;

class UserRepository extends Repository
{
    public function model()
    {
        return User::class;
    }

    public function create(array $data)
    {
        if ($data['password'] ?? false) {
            $data['password'] = bcrypt($data['password']);
        }
        if (empty($data['avatar'])) {
            $data['avatar'] = 'https://www.gravatar.com/avatar/00000000000000000000000000000000';
        }
        $data['is_activated'] = true;
        return parent::create($data);
    }

    public function update(array $data, $id, $attribute = "id")
    {
        if ($data['password'] ?? false) {
            $data['password'] = bcrypt($data['password']);
        }
        return parent::update($data, $id, $attribute);
    }
}
