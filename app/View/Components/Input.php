<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $label;
    public $type;
    public $isRequired;
    public $isDisabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = "input", $label = "Input", $type = "text", $isRequired = true, $isDisabled = false)
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = ($label == "Input" && $name != "input") ? ucfirst($name) : $label;
        $this->isRequired = $isRequired ? "required" : "";
        $this->isDisabled = $isDisabled ? "disabled" : "";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
