<?php

namespace App\View\Components\Alert;

use Illuminate\View\Component;

class Success extends Component
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('components.alert.success');
    }
}
