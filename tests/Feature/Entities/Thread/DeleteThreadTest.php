<?php

namespace Tests\Feature\Entities\Thread;

use Eyesee\Entities\Community\Models\Community;
use Eyesee\Entities\Thread\Models\Thread;
use Tests\TestCase;

/**
 * Class DeleteThreadTest
 * @package Tests\Feature\Entities\Thread
 */
class DeleteThreadTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_delete_a_thread()
    {
        $community = Community::factory()->create([
            Community::USER_ID => $this->getAuthenticatedUserId()
        ]);

        $thread = Thread::factory()->create([
            Thread::TITLE        => $this->faker->word,
            Thread::COMMUNITY_ID => $community->{Community::ID},
            Thread::USER_ID      => $this->getAuthenticatedUserId()
        ]);

        $response = $this->delete(route('threads.delete', ['id' => $thread->{Thread::ID}]));

        $response->assertStatus(204);

        $this->assertDatabaseMissing(Thread::TABLE, [
            Thread::ID => $thread->{Thread::ID},
        ]);
    }
}
