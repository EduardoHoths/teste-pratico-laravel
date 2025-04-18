<?php

namespace App\View\Components\Profile;

use Illuminate\View\Component;

class Avatar extends Component
{
    public $src;
    public $size;

    public function __construct($src, $size)
    {
        $this->src = $src;
        $this->size = $size;
    }

    public function render()
    {
        return view('components.profile.avatar');
    }
}
