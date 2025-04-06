<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Field extends Component
{
    public $label;
    public $name;
    public $type;
    public $value;
    public function __construct($label, $name, $type = 'text', $value = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form.field');
    }
}
