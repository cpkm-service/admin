<?php

namespace App\View\Components\Backend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSwitch extends Component
{
    public $tag;
    public $type;
    public $text;
    public $name;
    public $value;
    public $required;
    public $disabled;
    public $checked;
    /**
     * Create a new component instance.
     */
    public function __construct($tag, $text, $name, $value = '', $required = false, $disabled = false, $checked = false)
    {
        $this->tag = $tag;
        $this->name = $name;
        $this->value= $value;
        $this->required = $required;
        $this->text = $text;
        $this->disabled = $disabled;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("components.backend.{$this->tag}");
    }
}
