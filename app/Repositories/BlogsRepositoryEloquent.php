<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\blogsRepository;
use App\Entities\Blogs;
use App\Validators\BlogsValidator;

/**
 * Class BlogsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BlogsRepositoryEloquent extends BaseRepository implements BlogsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Blogs::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
