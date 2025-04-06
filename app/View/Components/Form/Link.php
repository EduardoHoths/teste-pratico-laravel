<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Link extends Component
{
    public $text;
    public $textLink;
    public $href;

    public function __construct($text, $href, $textLink)
    {
        $this->text = $text;
        $this->textLink = $textLink;
        $this->href = $href;
    }

    public function render()
    {
        return view('components.form.link');
    }
}
