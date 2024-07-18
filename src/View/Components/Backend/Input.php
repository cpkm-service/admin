<?php

namespace Cpkm\Admin\View\Components\Backend;

use Illuminate\View\Component;

class Input extends Component
{
    public $tag;
    public $type;
    public $text;
    public $placeholder;
    public $name;
    public $value;
    public $required;
    public $disabled;
    public $int;
    public $upCase;
    public $lowCase;

    public $max;

    public $min;

    public $readonly;

    public $float;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tag,$type,$text,$placeholder,$name,$value = '',$required = false,$disabled = false, $int = false, $upCase = false, $lowCase = false, $max = '', $min = '', $readonly = false, $float = false)
    {
        $this->tag = $tag;
        $this->type = $type;
        $this->name = $name;
        $this->value= $value;
        $this->required = $required;
        $this->text = $text;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled;
        $this->int = $int;
        $this->upCase = $upCase;
        $this->lowCase = $lowCase;
        $this->max = $max;
        $this->min = $min;
        $this->readonly = $readonly;
        $this->float = $float;
        if($this->float === false && is_float((float)$this->value)) {
            $temp = explode('.',(float)$this->value);
            $this->float = count($temp) > 1 ? strlen($temp[1]) : 0;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("admin::components.backend.{$this->tag}-{$this->type}");
    }
}
