<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class selectraw extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $label;
    public $size;
    public $options;
   public function __construct($name,$label,$size,$options)
   {
    $this->name = $name;    
    $this->label = $label;
    $this->size = $size;
    $this->options = $options;
   }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.selectraw');
    }
}
