<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $name, public string|null $value, public array $options = [], public string $placeholder = 'Choose...', public bool $hasSearch = true, public bool $required = false, public string $label) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-select');
    }
}
