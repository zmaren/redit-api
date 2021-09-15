<?php

namespace Eyesee\Entities\Community\UI\API\Controllers;

use App\Exceptions\CreateResourceFailedException;
use App\Http\Controllers\Controller;
use Eyesee\Entities\Community\Models\Community;
use Eyesee\Entities\Community\Services\CreateCommunityService;
use Eyesee\Entities\Community\UI\API\Requests\CreateCommunityRequest;

/**
 * Class CommunityController
 * @package Eyesee\Entities\Community\UI\API\Controllers
 */
class CommunityController extends Controller
{
    /**
     * @param CreateCommunityRequest $request
     * @param CreateCommunityService $service
     * @return Community
     * @throws CreateResourceFailedException
     */
    public function create(CreateCommunityRequest $request, CreateCommunityService $service): Community
    {
        return $service->run($request->validated());
    }
}
