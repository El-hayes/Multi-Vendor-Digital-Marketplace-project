<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public string $name;
    public string $label;

    public function __construct( string $name,string $label = null)
    {
        $this->name = $name;
        $this->label = $label ?? \Str::title(str_replace('_', ' ', $name));

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.input-select');
    }
}
