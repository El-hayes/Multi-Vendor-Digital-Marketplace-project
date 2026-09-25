<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputText extends Component
{
    /**
     * Create a new component instance.
     */

    public string $label ;
    public string $type ;
    public string $name ;
    public ?string $value ;
    public ?string $placeholder;


    public function __construct
    (
        string $name,
        string $type = 'text',
        string $label = null,
        string $value = null,
        string $placeholder = null
    )
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label ?? \Str::title(str_replace('_' , ' ' , $name));
        $this->value = $value;
        $this->placeholder = $placeholder;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.input-text');
    }
}
