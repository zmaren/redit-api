<?php

namespace Eyesee\Entities\Thread\UI\API\Requests;

use App\Rules\ThreadExistsForUserRule;
use Eyesee\System\Requests\Request;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class UpdateThreadRequest
 * @package Eyesee\Entities\Thread\UI\API\Requests
 */
class UpdateThreadRequest extends Request
{
    /**
     * @return array
     */
    #[ArrayShape(['id' => "array", 'title' => "string", 'description' => "string"])] public function rules()
    {
        return [
            'id'          => [
                'required',
                new ThreadExistsForUserRule()
            ],
            'title'       => 'required',
            'description' => 'required'
        ];
    }
}
