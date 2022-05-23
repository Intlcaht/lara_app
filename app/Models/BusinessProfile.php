<?php

namespace App\Models;

use App\Models\Base\BusinessProfile as BaseBusinessProfile;
use Hyn\Tenancy\Contracts\Tenant;
use Illuminate\Http\Request;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;

class BusinessProfile extends BaseBusinessProfile
{

    use UsesTenantConnection;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $website = new Website;
            $website->uuid = uniqid("BSP");
            app(WebsiteRepository::class)->create($website);
            //dd($website->uuid); // Unique id
        });
    }



    public function tenantIdentificationByHttp(Request $request): ?Tenant
    {
        list($subdomain) = explode('.', $request->getHost(), 2);
        return $this->query()
            ->where('subdomain', $subdomain)
            ->first();
    }

    protected $dispatchesEvents = [
        'created' => \Tenancy\Tenant\Events\Created::class,
        'updated' => \Tenancy\Tenant\Events\Updated::class,
        'deleted' => \Tenancy\Tenant\Events\Deleted::class,
    ];

    protected $fillable = [
        self::U_ID,
        self::CAP_PERCENTAGE,
        self::IS_ONLINE,
        self::ADDRESS,
        self::TITLE,
        self::DESCRIPTION,
        self::STATUS,
        self::TERMS_AND_CONDITIONS
    ];

    /**
     * The attribute of the Model to use for the key.
     *
     * @return string
     */
    public function getTenantKeyName(): string
    {
        return 'u_id';
    }

    /**
     * The actual value of the key for the tenant Model.
     *
     * @return string|int
     */
    public function getTenantKey()
    {
        return $this->u_id;
    }

    /**
     * A unique identifier, eg class or table to distinguish this tenant Model.
     *
     * @return string
     */
    public function getTenantIdentifier(): string
    {
        return get_class($this);
    }
}
