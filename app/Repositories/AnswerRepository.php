<?php


namespace App\Repositories;


use App\Answer;
use App\User;
use Bosnadev\Repositories\Eloquent\Repository;

class AnswerRepository extends Repository
{
    /**
     * @var User
     */
    protected $currentUser;

    /**
     * @return User
     */
    public function getCurrentUser(): User
    {
        return $this->currentUser;
    }

    /**
     * @param User $currentUser
     *
     * @return $this
     */
    public function setCurrentUser(User $currentUser)
    {
        $this->currentUser = $currentUser;
        return $this;
    }

    public function model()
    {
        return Answer::class;
    }

    public function create(array $data)
    {
        $this->model->fill($data)
            ->setAttribute('user_id', $this->getCurrentUser()->id)
            ->save();
        return $this->model;
    }


}
