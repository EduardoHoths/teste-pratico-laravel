<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class SubmitButton extends Component
{
    public $text;

    public function __construct($text = 'Enviar')
    {
        $this->text = $text;
    }

    public function render()
    {
        return view('components.form.submit-button');
    }
}
