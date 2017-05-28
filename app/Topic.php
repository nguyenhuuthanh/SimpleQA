<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Topic
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Topic whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Topic whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Topic whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Topic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Topic extends Model
{
    protected $fillable = ['name', 'description'];
}
