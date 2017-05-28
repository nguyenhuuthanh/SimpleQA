<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Rate
 *
 * @property int $id
 * @property int $answer_id
 * @property int $user_id
 * @property int $rate
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Rate whereAnswerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rate whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rate whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rate whereRate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rate whereUserId($value)
 * @mixin \Eloquent
 */
class Rate extends Model
{
    //
}
