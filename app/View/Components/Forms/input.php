<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $name;
     public $type;
     public $label;
     public $size;
    public function __construct($name,$type,$label,$size)
    {
     $this->name = $name;
     $this->type = $type;
     $this->label = $label;
     $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
