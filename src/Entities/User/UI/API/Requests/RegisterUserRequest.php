<?php

namespace Eyesee\Entities\User\UI\API\Requests;

use JetBrains\PhpStorm\ArrayShape;
use Eyesee\System\Requests\Request;

/**
 * Class RegisterUserRequest
 * @package Entities\User\UI\API\Requests
 */
class RegisterUserRequest extends Request
{
    #[ArrayShape(['email' => "string", 'password' => "string", 'name' => "string"])] public function rules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required',
            'name'     => 'required'
        ];
    }
}
