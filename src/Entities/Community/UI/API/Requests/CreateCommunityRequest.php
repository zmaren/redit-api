<?php

namespace Eyesee\Entities\Community\UI\API\Requests;

use Eyesee\System\Requests\Request;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class CreateCommunityRequest
 * @package Eyesee\Entities\Community\UI\API\Requests
 */
class CreateCommunityRequest extends Request
{
    /**
     * @return string[]
     */
    #[ArrayShape(['name' => "string", 'type' => "string", 'is_for_adult' => "string"])] public function rules(): array
    {
        return [
            'name'         => 'required|string|max:100',
            'type'         => 'required|in:1,2,3',
            'is_for_adult' => 'required|boolean'
        ];
    }
}
