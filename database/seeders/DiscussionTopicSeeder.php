<?php

namespace Database\Seeders;

use App\Models\DiscussionTopic;
use Illuminate\Database\Seeder;

class DiscussionTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DiscussionTopic::factory(10)->create();
    }
}
