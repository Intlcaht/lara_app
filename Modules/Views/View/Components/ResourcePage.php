<?php

namespace Modules\Views\View\Components;

use Illuminate\View\Component;

class ResourcePage extends Component
{
    public $title;
    public $subTitle;

    public $footerComponent;
    public $rightAsideComponent;

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('views::components.resourcepage');
    }
}
