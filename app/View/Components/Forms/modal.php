<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class modal extends Component
{
    
    public $title;

    public $label;

    public $color;

    public $modalname;
    public function __construct($title,$label,$color,$modalname)
    {
        $this->title = $title;
        $this->label = $label;
        $this->color = $color;
        $this->modalname = $modalname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.modal');
    }
}
