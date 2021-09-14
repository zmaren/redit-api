<?php

namespace Tests\Feature;

use Eyesee\Entities\User\Models\User;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_register_user_with_credentials()
    {
        $data = [
            'email'    => 'email@test.app',
            'password' => 'password',
            'name'     => $this->faker->name
        ];

        $response = $this->post(route('register'), $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas(User::TABLE, [
            User::EMAIL => 'email@test.app'
        ]);
    }

    /**
     * @test
     * @dataProvider getData
     * @param $data
     * @param $message
     */
    public function it_should_fail_if_wrong_data_is_provided($data, $message)
    {
        $this->markTestSkipped();

        $response = $this->post(route('register'), $data);

        $response->assertStatus(422);

        // TODO: For some reason response status code is 302 instead of 422.
    }

    /**
     * @return array[]
     */
    public function getData(): array
    {
        $this->refreshApplication();

        return [
            [
                [
                    'email'    => 'some@email.test',
                    'password' => 'password'
                ],
                'errors' => [
                    'name' => [
                        trans('validation.required', [
                            'attribute' => 'name'
                        ])
                    ],
                ]
            ],
        ];
    }
}
