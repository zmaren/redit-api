<?php

namespace Eyesee\Entities\Thread\UI\API\Requests;

use App\Rules\CommunityRule;
use App\Rules\ThreadDataRule;
use Eyesee\System\Requests\Request;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class CreateThreadRequest
 * @package Eyesee\Entities\Thread\UI\API\Requests
 */
class CreateThreadRequest extends Request
{
    /**
     * @return array
     */
    #[ArrayShape([
        'type'         => "string",
        'title'        => "string",
        'description'  => "string",
        'community_id' => "\App\Rules\CommunityRule",
        'is_for_adult' => "string",
        'data'         => "\App\Rules\ThreadDataRule",
    ])] public function rules(): array
    {
        return [
            'type'         => 'required|in:1,2,3,4',
            'title'        => 'required|string|max:300',
            'description'  => 'required',
            'community_id' => new CommunityRule(),
            'is_for_adult' => 'boolean',
            'data'         => new ThreadDataRule($this->type)
        ];
    }
}
