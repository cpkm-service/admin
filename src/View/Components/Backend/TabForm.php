<?php

namespace Cpkm\Admin\View\Components\Backend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TabForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $form,
        public $fields,
        public $table,
        public $detail,
        public $show
    ){
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin::components.backend.tab-form');
    }
}
