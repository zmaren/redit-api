<?php

namespace Database\Factories;

use Eyesee\Entities\Community\Models\Community;
use Eyesee\Entities\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Community::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            Community::NAME    => $this->faker->title(),
            Community::TYPE    => $this->faker->randomElement([1, 2, 3]),
            Community::USER_ID => User::factory()->create()->{User::ID}
        ];
    }
}
