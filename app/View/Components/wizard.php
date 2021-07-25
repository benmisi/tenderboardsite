<?php

namespace App\View\Components;

use Illuminate\View\Component;

class wizard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $steps;
    public function __construct($steps)
    {
        $this->steps = $steps;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.wizard');
    }
}
