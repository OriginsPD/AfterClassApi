<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Views;
use Illuminate\Support\Str;
use App\Models\DiscussionTopic;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Views::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'discus_topic_id' => DiscussionTopic::factory(),
            // 'views' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
