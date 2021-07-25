<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class hidden extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;

    public $value;
    public function __construct($name,$value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.hidden');
    }
}
