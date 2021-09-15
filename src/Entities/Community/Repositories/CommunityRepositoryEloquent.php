<?php

namespace Eyesee\Entities\Community\Repositories;

use Eyesee\Entities\Community\Models\Community;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class CommunityRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CommunityRepositoryEloquent extends BaseRepository implements CommunityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Community::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
