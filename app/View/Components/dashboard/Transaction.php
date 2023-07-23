<?php

namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Transaction extends Component
{
    /**
     * Create a new component instance.
     */
    // public $text;
    public function __construct()
    {
        // $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard.components.transaction');
    }
}