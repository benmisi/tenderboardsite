<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $type;
    public $label;
    public $color;
    public $size;
    public function __construct($type,$label,$color,$size)
    {
      $this->type = $type;
      $this->label = $label;
      $this->color = $color;
      $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.button');
    }
}
