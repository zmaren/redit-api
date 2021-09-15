<?php

namespace Tests\Unit\Rules;

use App\Rules\ThreadExistsForUserRule;
use Eyesee\Entities\Thread\Models\Thread;
use Eyesee\Entities\User\Models\User;
use Tests\TestCase;

/**
 * Class ThreadExistsForUserRuleTest
 * @package Tests\Unit\Rules
 */
class ThreadExistsForUserRuleTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_pass_id_exists_for_user_rule()
    {
        $rule = new ThreadExistsForUserRule();

        $thread = Thread::factory()->create([
            Thread::USER_ID => $this->getAuthenticatedUserId()
        ]);

        $this->assertTrue($rule->passes('id', $thread->{Thread::USER_ID}));
    }

    /**
     * @test
     */
    public function it_should_fail_if_id_does_not_belongs_to_the_user()
    {
        $rule = new ThreadExistsForUserRule();

        $user = User::factory()->create();

        $thread = Thread::factory()->create([
            Thread::USER_ID => $user->{User::ID}
        ]);

        $this->assertFalse($rule->passes('id', $thread->{User::ID}));
    }
}
