<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductList extends Component
{
    public $title;
    public $products;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = "", $products = [])
    {
        $this->title = $title;
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-list');
    }
}
