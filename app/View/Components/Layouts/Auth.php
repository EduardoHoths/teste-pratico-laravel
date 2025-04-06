<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Auth extends Component
{
    public string $title;
    public string $subtitle;
    public function __construct($title = "Auth", $subtitle = '')
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.auth');
    }
}
