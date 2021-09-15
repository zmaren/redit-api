<?php

namespace Eyesee\Entities\Authentication\UI\API\Requests;

use Eyesee\System\Requests\Request;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class LoginRequest
 * @package Eyesee\Entities\Authentication\UI\API\Requests
 */
class LoginRequest extends Request
{
    /**
     * @return string[]
     */
    #[ArrayShape(['email' => "string", 'password' => "string"])] public function rules(): array
    {
        return [
            'email'    => 'required|exists:users,email',
            'password' => 'required'
        ];
    }
}
