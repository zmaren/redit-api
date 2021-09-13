<?php

namespace Eyesee\Entities\User\Services;

use Eyesee\Entities\User\Models\User;
use Eyesee\Entities\User\Repositories\UserRepository;
use Eyesee\System\Services\MainService;

/**
 * Class FindRedditUserService
 * @package Eyesee\Entities\User\Services
 */
class FindRedditUserService extends MainService
{
    protected string $repositoryName = UserRepository::class;

    /**
     * @param string $redditToken
     * @return User|null
     */
    public function run(string $redditToken): User|null
    {
        return $this->repository->findByField('reddit_token', $redditToken)->first();
    }
}
