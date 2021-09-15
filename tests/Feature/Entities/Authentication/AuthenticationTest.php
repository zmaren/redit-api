<?php

namespace Tests\Feature\Entities\Authentication;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

/**
 * Class AuthenticationTest
 * @package Tests\Feature\Entities\Authentication
 */
class AuthenticationTest extends TestCase
{
    /**
     * @return string[]
     */
    private function getExcludes(): array
    {
        return [
            'login/reddit',
            'login/redirect',
            'api/register',
            'sanctum/csrf-cookie'
        ];
    }

    /**
     * @test
     */
    public function it_should_fail_to_access_route_without_auth_permission()
    {
        $routes = Route::getRoutes();

        $exclude = $this->getExcludes();

        foreach ($routes as $route) {
            if (in_array($route->uri, $exclude)) {
                continue;
            }

            foreach ($route->methods as $method) {
                switch ($method) {
                    case 'GET':
                        $response = $this->get($route->uri, []);

                        $response->assertStatus(401);
                        break;
                    case 'POST':
                        $response = $this->post($route->uri, [], [
                            'Accept' => 'application/json'
                        ]);

                        $response->assertStatus(401);
                        break;
                    case 'PUT':
                        $response = $this->put($route->uri, [], [
                            'Accept' => 'application/json'
                        ]);

                        $response->assertStatus(401);
                        break;
                    case 'PATCH':
                        $response = $this->patch($route->uri, [], [
                            'Accept' => 'application/json'
                        ]);

                        $response->assertStatus(401);
                        break;
                    case 'DELETE':
                        $response = $this->delete($route->uri, [], [
                            'Accept' => 'application/json'
                        ]);

                        $response->assertStatus(401);
                        break;

                }
            }
        }
    }
}
