<?php

namespace Database\Seeders;

use App\Models\DiscussionTag;
use Illuminate\Database\Seeder;

class DiscussionTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DiscussionTag::factory(10)->count(5)->create();
    }
}
