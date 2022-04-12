<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\DiscussionTopic;
use App\Models\Topic;
use App\Models\User;

class DiscussionTopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiscussionTopic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'content' => $this->faker->paragraphs(3, true),
            'topic_id' => Topic::factory(),
            'category_id' => Category::factory(),
            'status' => $this->faker->boolean,
        ];
    }
}
