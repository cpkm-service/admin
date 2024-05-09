<?php

namespace Cpkm\Admin\View\Components\Backend;

use Illuminate\View\Component;

class MultipleTable extends Component
{
    public $parameters;
    public $text;
    public $key;
    public $name;
    public $value;
    public $required;

    public $disabled;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($parameters,$text,$name,$key,$value = [],$required = false, $disabled = false)
    {
        $this->parameters = $parameters;
        $this->name = $name;
        $this->value= $value;
        $this->text = $text;
        $this->key = $key;
        $this->required = $required;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("admin::components.backend.multiple_table");
    }
}
