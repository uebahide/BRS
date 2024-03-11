<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BorrowsListItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $borrows, public $type)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.borrows-list-item');
    }
}
