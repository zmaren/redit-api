<?php

namespace Tests\Feature\Entities\Community;

use Eyesee\Entities\Community\Models\Community;
use Tests\TestCase;

/**
 * Class CreateCommunityTest
 * @package Tests\Feature\Entities\Community
 */
class CreateCommunityTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_a_community()
    {
        $community = Community::factory()->make([
            Community::USER_ID      => $this->getAuthenticatedUserId(),
            Community::IS_FOR_ADULT => false
        ]);

        $response = $this->post(route('communities.create'), $community->attributesToArray());

        $response->assertStatus(201);

        $this->assertDatabaseHas(Community::TABLE, $community->attributesToArray());
    }
}
