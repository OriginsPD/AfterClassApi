<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call(TopicSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(DiscussionTopicSeeder::class);
        $this->call(DiscussionTagSeeder::class);
        $this->call(ReplySeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(LikeSeeder::class);
    }
}
