<?php

namespace Tests\Feature;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User;
use Mockery;
use SocialiteProviders\Reddit\Provider;
use Tests\TestCase;

/**
 * Class UserAuthenticationTest
 * @package Tests\Feature
 */
class UserAuthenticationTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_login_user_using_reddit()
    {
        $providerMock = \Mockery::mock(Provider::class);

        $providerMock->shouldReceive('redirect')->andReturn(new RedirectResponse(env('APP_URL') . '/login/redirect'));

        Socialite::shouldReceive('driver')->with('reddit')->andReturn($providerMock);

        $loginResponse = $this->get(route('reddit.login'));

        $loginResponse->assertStatus(302);

        $redirectLocation = $loginResponse->headers->get('location');

        $this->assertContains(
            'http://laravel.test/login/redirect',
            [$redirectLocation]
        );
    }
}
