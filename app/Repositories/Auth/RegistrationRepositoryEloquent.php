<?php

namespace App\Repositories\Auth;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Auth\RegistrationRepository;
use App\Models\Registration;
use App\Validators\Auth\RegistrationValidator;

/**
 * Class RegistrationRepositoryEloquent.
 *
 * @package namespace App\Repositories\Auth;
 */
class RegistrationRepositoryEloquent extends BaseRepository implements RegistrationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Registration::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
