<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
    //  * @return void
     */
    public function run()
    {
        Topic::factory()->create();
    }
}
