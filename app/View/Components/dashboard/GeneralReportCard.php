<?php

namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GeneralReportCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $value;
    public $updown;
    public $theme;
    public $diff;
    public $icon;
    public $iconColor;
    public function __construct($title, $value, $updown, $theme, $diff, $icon, $iconColor)
    {
        $this->title = $title;
        $this->value = $value;
        $this->updown = $updown;
        $this->theme = $theme;
        $this->diff = $diff;
        $this->icon = $icon;
        $this->iconColor = $iconColor;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard.components.general_report_card');
    }
}