<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Answer
 *
 * @property int $id
 * @property int $user_id
 * @property int $question_id
 * @property string $answer
 * @property string $status
 * @property int $answer_parent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereAnswer($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereAnswerParent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereQuestionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Answer whereUserId($value)
 * @mixin \Eloquent
 */
class Answer extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'answer',
        'status',
        'question_id',
        'answer_parent'
    ];
}
