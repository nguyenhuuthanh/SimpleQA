<?php


namespace App\Repositories;


use App\User;
use Bosnadev\Repositories\Eloquent\Repository;

class UserRepository extends Repository
{
    const DEFAULT_AVATAR = 'https://www.gravatar.com/avatar/00000000000000000000000000000000';

    public function model()
    {
        return User::class;
    }

    public function create(array $data)
    {
        $this->model->fill($data)
            ->setPassword($data['password'] ?? false)
            ->setAvatar($data['avatar'] ?? static::DEFAULT_AVATAR)
            ->setAttribute('is_activated', true)
            ->save();
        return $this->model;
    }

    public function update(array $data, $id, $attribute = "id")
    {
        return $this->model->where($attribute, '=', $id)
            ->setPassword($data['password'] ?? false)
            ->setAvatar($data['avatar'] ?? false)
            ->update($data);
    }
}
