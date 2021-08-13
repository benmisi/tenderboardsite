<?php

namespace App\View\Components\user;

use Illuminate\View\Component;

class header extends Component
{
    public $subscription;
    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.header');
    }
}
