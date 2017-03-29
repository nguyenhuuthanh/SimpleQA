<?php

class RandomIdProvider
{
    private static  $cache = [];

    /**
     * Get random ID for one of existing records for specified model
     * @param $model
     * @param Faker\Generator $faker
     * @return int
     */
    public static function get($model, Faker\Generator $faker)
    {
        $key = is_string($model) ? $model : get_class($model);

        if (isset(static::$cache[$key])) {
            $ids = static::$cache[$key];
        } else {
            /* @var \Illuminate\Database\Eloquent\Builder $query */
            $query = $model::query();
            $ids = $query->select('id')->pluck('id')->toArray();
        }
        return $faker->randomElement($ids);
    }
}