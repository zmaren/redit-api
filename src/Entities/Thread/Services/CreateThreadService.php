<?php

namespace Eyesee\Entities\Thread\Services;

use App\Exceptions\CreateResourceFailedException;
use Eyesee\Entities\Thread\Models\Thread;
use Eyesee\Entities\Thread\Repositories\ThreadRepository;
use Eyesee\System\Services\MainService;

/**
 * Class CreateThreadService
 * @package Eyesee\Entities\Thread\Services
 */
class CreateThreadService extends MainService
{
    /**
     * @var string
     */
    protected string $repositoryName = ThreadRepository::class;

    /**
     * @param array $data
     * @return Thread
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Thread
    {
        try {
            $data['user_id'] = auth()->id();

            return $this->repository->create($data);
        } catch (\Exception $exception) {
            dd($exception);
            throw new CreateResourceFailedException();
        }
    }
}
