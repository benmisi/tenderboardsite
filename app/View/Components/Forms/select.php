<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $label;
    public $size;
    public $optionlist;
   public function __construct($name,$label,$size,$optionlist)
   {
    $this->name = $name;    
    $this->label = $label;
    $this->size = $size;
    $this->optionlist = $optionlist;
   }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
