<?php

namespace Tests\Feature\Entities\Thread;

use Eyesee\Entities\Community\Models\Community;
use Eyesee\Entities\Thread\Models\Thread;
use Tests\TestCase;

/**
 * Class UpdateThreadTest
 * @package Tests\Feature\Entities\Thread
 */
class UpdateThreadTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_update_a_thread()
    {
        $community = Community::factory()->create([
            Community::USER_ID => $this->getAuthenticatedUserId()
        ]);

        $thread = Thread::factory()->create([
            Thread::TITLE        => $this->faker->word,
            Thread::COMMUNITY_ID => $community->{Community::ID},
            Thread::USER_ID      => $this->getAuthenticatedUserId()
        ]);

        $response = $this->put(route('threads.update', ['id' => $thread->{Thread::ID}]), [
            Thread::TITLE => 'test'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas(Thread::TABLE, [
            Thread::ID    => $thread->{Thread::ID},
            Thread::TITLE => 'test'
        ]);
    }
}
