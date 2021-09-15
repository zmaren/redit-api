<?php

namespace Eyesee\Entities\Thread\Models;

use Eyesee\System\Models\MainModel;

/**
 * Class Thread
 * @package Eyesee\Entities\Thread\Models
 */
class Thread extends MainModel
{
    const ID = 'id';
    const USER_ID = 'user_id';
    const TYPE = 'type';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const DATA = 'data';
    const COMMUNITY_ID = 'community_id';
    const TABLE = 'threads';

    const THREAD_TYPE_POST = 1;
    const THREAD_TYPE_FILE = 2;
    const THREAD_TYPE_URL = 3;
    const THREAD_TYPE_POLL = 4;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::USER_ID,
        self::TYPE,
        self::TITLE,
        self::DESCRIPTION,
        self::DATA,
        self::COMMUNITY_ID,
    ];
}
