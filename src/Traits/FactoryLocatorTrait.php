<?php

namespace Eyesee\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;

trait FactoryLocatorTrait
{
    protected static function newFactory(): Factory
    {
        $separator = '\\';
        $factoriesPath = 'Factories' . $separator;
        $nameSpace = 'Database' . $separator . $factoriesPath;

        Factory::useNamespace($nameSpace);
        $className = class_basename(static::class);
        return Factory::factoryForModel($className);
    }
}
