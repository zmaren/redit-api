<?php

namespace Tests;

use Eyesee\Entities\User\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\HigherOrderCollectionProxy;

abstract class NoAuthTestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    protected Generator $faker;

    protected Collection|Model|null $authenticatedUser;

    public function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();
    }
}
