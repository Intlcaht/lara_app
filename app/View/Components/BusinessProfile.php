<?php

namespace App\View\Components;

use App\Models\BusinessProfile as ModelsBusinessProfile;
use Illuminate\View\Component;

class BusinessProfile extends Component
{
    public ModelsBusinessProfile $business;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business-profile');
    }
}
