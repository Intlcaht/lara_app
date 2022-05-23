<?php

namespace App\Repositories\Auth;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\auth\user_roleRepository;
use App\Models\UserRole;
use App\Validators\Auth\UserRoleValidator;

/**
 * Class UserRoleRepositoryEloquent.
 *
 * @package namespace App\Repositories\Auth;
 */
class UserRoleRepositoryEloquent extends BaseRepository implements UserRoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserRole::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
