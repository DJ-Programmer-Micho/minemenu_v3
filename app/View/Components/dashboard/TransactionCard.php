<?php

namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TransactionCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $date;
    public $textColor;
    public $value;
    public $image;
    public function __construct($name, $date, $textColor, $value, $image)
    {
        $this->name = $name;
        $this->date = $date;
        $this->textColor = $textColor;
        $this->value = $value;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard.components.transaction_card');
    }
}