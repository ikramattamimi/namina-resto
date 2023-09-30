<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $label;
    public $isRequired;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $isRequired = true)
    {
        $this->label = $label;
        $this->name = $name;
        $this->isRequired = $isRequired ? "required" : "";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select');
    }
}
