<?php

namespace Eyesee\System\Models;

use Eyesee\Traits\FactoryLocatorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MainModel
 * @package Eyesee\System\Models
 */
abstract class MainModel extends Model
{
    use HasFactory, FactoryLocatorTrait {
        FactoryLocatorTrait::newFactory insteadof HasFactory;
    }
}
