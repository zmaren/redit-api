<?php

namespace Eyesee\Entities\Thread\UI\API\Requests;

use App\Rules\ThreadExistsForUserRule;
use Eyesee\System\Requests\Request;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class DeleteThreadRequest
 * @package Eyesee\Entities\Thread\UI\API\Requests
 */
class DeleteThreadRequest extends Request
{
    protected array $urlParameters = [
        'id'
    ];

    /**
     * @return array
     */
    #[ArrayShape(['id' => "array", 'title' => "string", 'description' => "string"])] public function rules(): array
    {
        return [
            'id'          => [
                'required',
                new ThreadExistsForUserRule()
            ],
        ];
    }
}
