<?php


namespace App\Repositories;


use App\Models\Topic;
use Bosnadev\Repositories\Eloquent\Repository;

class TopicRepository extends Repository
{
    public function model()
    {
        return Topic::class;
    }
}
