<?php

namespace Eyesee\Entities\Thread\Repositories;

use Eyesee\Entities\Thread\Models\Thread;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ThreadRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ThreadRepositoryEloquent extends BaseRepository implements ThreadRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Thread::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
