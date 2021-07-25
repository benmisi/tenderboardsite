<?php

namespace App\View\Components\user;

use Illuminate\View\Component;

class services extends Component
{
   
    public $service;
    public $size;
    public function __construct($service,$size)
    {
        $this->service = $service;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.services');
    }
}
