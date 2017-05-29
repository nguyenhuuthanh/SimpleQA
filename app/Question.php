<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Question
 *
 * @property int $id
 * @property int $user_id
 * @property int $topic_id
 * @property string $title
 * @property string $content
 * @property string $status
 * @property int $view
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereTopicId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Question whereView($value)
 * @mixin \Eloquent
 */
class Question extends Model
{
    protected $fillable = [
        'title',
        'content',
        'status',
        'topic_id',
    ];
}
