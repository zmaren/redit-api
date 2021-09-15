<?php

namespace Eyesee\Entities\Thread\UI\API\Controllers;

use App\Exceptions\CreateResourceFailedException;
use App\Exceptions\UpdateResourceFailedException;
use App\Http\Controllers\Controller;
use Eyesee\Entities\Thread\Models\Thread;
use Eyesee\Entities\Thread\Services\CreateThreadService;
use Eyesee\Entities\Thread\Services\UpdateThreadService;
use Eyesee\Entities\Thread\UI\API\Requests\CreateThreadRequest;
use Eyesee\Entities\Thread\UI\API\Requests\UpdateThreadRequest;

/**
 * Class ThreadController
 * @package Eyesee\Entities\Thread\UI\API\Controllers
 */
class ThreadController extends Controller
{
    /**
     * @param CreateThreadRequest $request
     * @param CreateThreadService $service
     * @return Thread
     * @throws CreateResourceFailedException
     */
    public function create(CreateThreadRequest $request, CreateThreadService $service): Thread
    {
        return $service->run($request->validated());
    }

    /**
     * @throws UpdateResourceFailedException
     */
    public function update(UpdateThreadRequest $request, UpdateThreadService $service)
    {
        return $service->run($request->only([
            Thread::TITLE,
            Thread::DESCRIPTION
        ]), $request->id);
    }
}
