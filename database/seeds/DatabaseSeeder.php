<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Model::unguard();

        //create a user
        $user = new \App\User();
        $user->id = 1;
        $user->name = 'thanhnguyen';
        $user->email = "thanh.nguyen@saritasa.com";
        $user->password = bcrypt('123456');
        $user->gender = 1;
        $user->avatar = 'https://avatars1.githubusercontent.com/u/13825279?v=3&s=460';
        $user->is_activated = 1;
        $user->save();

        $this->call(UsersTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
    }
}
