<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PlnillaCarts extends Component
{
    public $planilla;
    public function __construct($planilla)
    {
        $this->planilla = $planilla;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.plnilla-carts' ,['planilla' => $this->planilla]);
    }
}
