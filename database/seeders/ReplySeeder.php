<?php

namespace Database\Seeders;

use App\Models\Reply;
use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Reply::factory(10)->count(5)->create();
    }
}