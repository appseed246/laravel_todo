<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function ($user) {
            // プロフィールの作成
            $user->profile()->save(factory(App\UserProfile::class)->make());
            
            // タスクの作成
            factory(App\Task::class, 5)->make()->each(function ($task) use ($user) {
                $user->tasks()->save($task);
            });
        });
    }
}
