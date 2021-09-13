<?php

namespace Eyesee\Entities\User\UI\API\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Eyesee\Entities\User\Services\CreateUserByCredentialsService;
use Eyesee\Entities\User\UI\API\Requests\RegisterUserRequest;

/**
 * Class UserController
 * @package Entities\User\UI\API\Controllers
 */
class UserController extends Controller
{
    /**
     * @param RegisterUserRequest $request
     * @param CreateUserByCredentialsService $service
     * @return mixed|void
     * @throws Exception
     */
    public function registerUser(RegisterUserRequest $request, CreateUserByCredentialsService $service)
    {
        return $service->run($request->validated());
    }
}
