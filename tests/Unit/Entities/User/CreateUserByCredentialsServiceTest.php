<?php

namespace Tests\Unit\Entities\User;

use Eyesee\Entities\User\Models\User;
use Eyesee\Entities\User\Services\CreateUserByCredentialsService;
use Tests\TestCase;

/**
 * Class CreateUserByCredentialsServiceTest
 * @package Tests\Unit\Entities\User
 */
class CreateUserByCredentialsServiceTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_user_by_credentials()
    {
        app(CreateUserByCredentialsService::class)->run([
            User::EMAIL    => 'email@test.test',
            User::PASSWORD => 'password'
        ]);

        $this->assertDatabaseHas(User::TABLE, [
            User::EMAIL => 'email@test.test'
        ]);
    }
}
