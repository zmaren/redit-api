<?php

namespace Eyesee\Entities\Thread\Services;

use App\Exceptions\UpdateResourceFailedException;
use Eyesee\Entities\Thread\Models\Thread;
use Eyesee\Entities\Thread\Repositories\ThreadRepository;
use Eyesee\System\Services\MainService;

/**
 * Class UpdateThreadService
 * @package Eyesee\Entities\Thread\Services
 */
class UpdateThreadService extends MainService
{
    /**
     * @var string
     */
    protected string $repositoryName = ThreadRepository::class;

    /**
     * @param array $data
     * @param int $id
     * @return Thread
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, int $id): Thread
    {
        try {
            return $this->repository->update($data, $id);
        } catch (\Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
