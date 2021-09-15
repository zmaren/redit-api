<?php

namespace Eyesee\Entities\Community\Services;

use App\Exceptions\CreateResourceFailedException;
use Eyesee\Entities\Community\Models\Community;
use Eyesee\Entities\Community\Repositories\CommunityRepository;
use Eyesee\System\Services\MainService;

/**
 * Class CreateCommunityService
 * @package Eyesee\Entities\Community\Services
 */
class CreateCommunityService extends MainService
{
    /**
     * @var string
     */
    protected string $repositoryName = CommunityRepository::class;

    /**
     * @param array $data
     * @return Community
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Community
    {
        try {
            $data['user_id'] = auth()->id();

            return $this->repository->create($data);
        } catch (\Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
