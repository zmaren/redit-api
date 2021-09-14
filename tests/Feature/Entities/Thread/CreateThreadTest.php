<?php

namespace Tests\Feature\Entities\Thread;

use Eyesee\Entities\Community\Models\Community;
use Eyesee\Entities\Thread\Models\Thread;
use Tests\TestCase;

/**
 * Class CreateThreadTest
 * @package Tests\Feature\Entities\Thread
 */
class CreateThreadTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_a_thread()
    {
        $community = Community::factory()->create([
            Community::USER_ID => $this->getAuthenticatedUserId()
        ]);

        $thread = Thread::factory()->make([
            Thread::COMMUNITY_ID => $community->{Community::ID},
            Thread::USER_ID      => $this->getAuthenticatedUserId()
        ]);

        $response = $this->post(route('threads'), $thread->attributesToArray());

        $response->assertStatus(201);

        $this->assertDatabaseHas(Thread::TABLE, $thread->attributesToArray());
    }
}
