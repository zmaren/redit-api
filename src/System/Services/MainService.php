<?php

namespace Eyesee\System\Services;

use Eyesee\System\Repositories\MainRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class MainService
 * @package System\Services
 */
class MainService
{
    protected string $repositoryName;

    protected RepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = app()->make($this->repositoryName);
    }
}
