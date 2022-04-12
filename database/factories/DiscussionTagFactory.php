<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DiscussionTag;
use App\Models\DiscussionTopic;
use App\Models\Tag;

class DiscussionTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiscussionTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'discus_topic_id' => DiscussionTopic::factory(),
            'tag_id' => Tag::factory(),
        ];
    }
}
