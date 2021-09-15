<?php

namespace Tests;

use Eyesee\Entities\User\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    protected Generator $faker;

    protected Collection|Model|null $authenticatedUser;

    public function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();

        $this->createAuthenticatedUser();
    }

    /**
     * @return int
     */
    protected function getAuthenticatedUserId(): int
    {
        return $this->authenticatedUser->{User::ID};
    }

    private function createAuthenticatedUser(): void
    {
        $this->authenticatedUser = User::factory()->create();
        $this->actingAs($this->authenticatedUser);
    }
}
