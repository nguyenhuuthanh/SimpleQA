<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    protected $fillable = [
        'title',
        'content',
        'status',
        'topic_id',
    ];
}
