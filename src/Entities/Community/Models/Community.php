<?php

namespace Eyesee\Entities\Community\Models;

use Eyesee\System\Models\MainModel;

/**
 * Class Community
 * @package Eyesee\Entities\Community\Models
 */
class Community extends MainModel
{
    const ID = 'id';
    const USER_ID = 'user_id';
    const TYPE = 'type';
    const IS_FOR_ADULT = 'is_for_adult';
    const NAME = 'name';

    const TABLE = 'communities';

    /**
     * @var string[]
     */
    protected $fillable = [
        self::USER_ID,
        self::TYPE,
        self::IS_FOR_ADULT,
        self::NAME,
    ];
}
