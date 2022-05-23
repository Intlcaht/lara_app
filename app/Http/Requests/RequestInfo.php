<?php
namespace App\Http\Requests;

use App\Models\BaseModel;

interface RequestInfo
{
    function body(): ?BaseModel;
}
