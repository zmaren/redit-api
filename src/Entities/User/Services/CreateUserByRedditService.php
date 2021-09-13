<?php

namespace Eyesee\Entities\User\Services;

use App\Exceptions\CreateUserFailedException;
use Exception;
use Eyesee\System\Services\MainService;
use Eyesee\Entities\User\Repositories\UserRepository;

/**
 * Class CreateUserByRedditService
 * @package Entities\User\Services
 */
class CreateUserByRedditService extends MainService
{
    /**
     * @var string
     */
    protected string $repositoryName = UserRepository::class;

    /**
     * @param array $data
     * @return mixed|void
     * @throws Exception
     */
    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $exception) {
            throw new CreateUserFailedException();
        }
    }
}
