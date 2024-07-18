<?php

namespace Cpkm\Admin\View\Components\Backend;

use Illuminate\View\Component;

class Select extends Component
{
    public $selecteds;
    public $text;
    public $placeholder;
    public $name;
    public $value;
    public $required;
    public $disabled;
    public $readonly;
    public $options;
    public $multiple;
    public $children;
    public $ajax;
    public $templateResult;
    public $templateSelection;

    public $source;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selected = [],$text,$placeholder,$name,$options = [],$children = [],$multiple=false,$value = '',$required = false,$disabled = false, $ajax = '', $readonly = false, $source = [], $templateResult = '', $templateSelection = '', public $class='')
    {
        $this->selected = $selected;
        $this->name = $name;
        $this->value= $value;
        $this->required = $required;
        $this->text = $text;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled;
        $this->options = $options;
        $this->multiple = $multiple;
        $this->children = $children;
        $this->ajax = $ajax;
        $this->readonly = $readonly;
        if($source) {
            $class = $source['class'];
            $method = $source['method'];
            $params = $source['params'] ?? '';
            $service = app($source['class']);
            $this->options = $service->select($params);
        }

        foreach ($this->options as &$option) {
            $option['selected'] = in_array($option['value'], $this->selected);
        }

        $this->templateResult = $templateResult;
        $this->templateSelection = $templateSelection;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin::components.backend.select');
    }
}
