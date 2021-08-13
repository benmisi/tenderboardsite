<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class textareaedit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $label;
    public $size;
    public $value;
   public function __construct($name,$label,$size,$value)
   {
    $this->name = $name;    
    $this->label = $label;
    $this->size = $size;
    $this->value = $value;
   }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.textareaedit');
    }
}
