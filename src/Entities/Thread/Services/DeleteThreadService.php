<?php

namespace Eyesee\Entities\Thread\Services;

use App\Exceptions\DeleteResourceFailedException;
use Eyesee\Entities\Thread\Models\Thread;
use Eyesee\Entities\Thread\Repositories\ThreadRepository;
use Eyesee\System\Services\MainService;

/**
 * Class DeleteThreadService
 * @package Eyesee\Entities\Thread\Services
 */
class DeleteThreadService extends MainService
{
    /**
     * @var string
     */
    protected string $repositoryName = ThreadRepository::class;

    /**
     * @param int $id
     * @return void
     * @throws DeleteResourceFailedException
     */
    public function run(int $id): void
    {
        try {
            $this->repository->delete($id);
        } catch (\Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
