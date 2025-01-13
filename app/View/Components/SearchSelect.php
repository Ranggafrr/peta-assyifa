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
<<<<<<< HEAD
    public function __construct(public string $name, public string|null $value, public array $options = [], public string $placeholder = 'Choose...', public bool $hasSearch = true, public bool $required = false, public string $label) {}
=======
    public function __construct(public string $name, public string $label,  public array $options = [], public string $placeholder = 'Choose...', public bool $hasSearch = true, public bool $required = false, public string|null $value) {}
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-select');
    }
}
