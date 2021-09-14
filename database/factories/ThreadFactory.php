<?php

namespace Database\Factories;

use Eyesee\Entities\Community\Models\Community;
use Eyesee\Entities\Thread\Models\Thread;
use Eyesee\Entities\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement([1, 2, 3, 4]);

        $data = match ($type) {
            Thread::THREAD_TYPE_FILE => null,
            Thread::THREAD_TYPE_URL => $this->faker->url,
            Thread::THREAD_TYPE_POLL => json_encode([
                'option_1' => [
                    'title' => $this->faker->word,
                ],
                'option_2' => [
                    'title' => $this->faker->word,
                ]
            ]),
            default => $this->faker->text,
        };

        return [
            Thread::TITLE        => $this->faker->jobTitle,
            Thread::DESCRIPTION  => $this->faker->text,
            Thread::TYPE         => $type,
            Thread::COMMUNITY_ID => Community::factory()->create()->{Community::ID},
            Thread::USER_ID      => User::factory()->create()->{User::ID},
            Thread::DATA         => $data
        ];
    }
}
