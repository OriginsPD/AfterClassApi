<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Like::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {

        $responseTopic = ['reply', 'comment','discussTopic'];
        $arra = array_rand($responseTopic);
        return [
            'user_id' => User::factory(),
            'item_id' => $this->faker->numberBetween(1, 10),
            'item_topic' => $responseTopic[$arra],
        ];
    }
}
