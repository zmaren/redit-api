<?php

namespace Tests\Unit\Rules;

use App\Rules\ThreadDataRule;
use Eyesee\Entities\Thread\Models\Thread;
use Tests\TestCase;

/**
 * Class ThreadDataRuleTest
 * @package Tests\Unit\Rules
 */
class ThreadDataRuleTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_pass_thread_data_post_rule()
    {
        $rule = new ThreadDataRule(Thread::THREAD_TYPE_POST);

        $this->assertTrue($rule->passes('data', 'random text'));
    }

    /**
     * @test
     */
    public function it_should_pass_thread_data_url_rule()
    {
        $rule = new ThreadDataRule(Thread::THREAD_TYPE_URL);

        $this->assertTrue($rule->passes('data', $this->faker->url));
    }

    /**
     * @test
     */
    public function it_should_pass_thread_data_poll_rule()
    {
        $rule = new ThreadDataRule(Thread::THREAD_TYPE_POLL);

        $this->assertTrue($rule->passes('data', json_encode(['json' => true])));
    }
}
