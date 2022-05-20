<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

/**
 * Undocumented class
 */
class BaseModel extends Model
{
    /**
     *
     */
    use HasFactory;


    public function makeUId($prefix = "ID"): string
    {
        return uniqid($prefix);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        // self::creating(function ($model) {
        //    if(self::schemaHasColumn('uId')) {
        //     $model->uId = (string) Uuid::generate(4);
        //    }
        // });
    }

    // public function getAttribute($key)
    // {
    //     $value = parent::getAttribute($key);

    //     if (isset($this->attributes[$key])) {
    //         if (isset($this->dates)  &&  in_array($key, $this->dates)) {
    //             $value = \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    //         }
    //     }

    //     return $value;
    // }
}
