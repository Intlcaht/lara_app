<?php

namespace App\Traits;

use Carbon\Carbon;

trait FormatDates
{

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $newDateFormat = 'Y-m-d H:i:s.u';

    /**
     * Undocumented function
     *
     * @param [type] $date
     * @return void
     */
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format($this->newDateFormat);
    }

    /**
     * Undocumented function
     *
     * @param [type] $date
     * @return void
     */
    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format($this->newDateFormat);
    }

    /**
     * Undocumented function
     *
     * @param [type] $date
     * @return void
     */
    public function setDeletedAtAttribute($date)
    {
        $this->attributes['deleted_at'] = Carbon::parse($date);
    }

    /**
     * Undocumented function
     *
     * @param [type] $date
     * @return void
     */
    public function getDeletedAtAttribute($date)
    {
        return Carbon::parse($date)->format($this->newDateFormat);
    }
}
