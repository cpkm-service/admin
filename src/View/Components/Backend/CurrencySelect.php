<?php

namespace App\View\Components\Backend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Service\CurrencyService;

class CurrencySelect extends Component
{
    public $options = [];

    public $name;

    public $value;

    public $disabled;

    public $currencies;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $value, $disabled)
    {
        $this->CurrencyService = app(CurrencyService::class);
        $this->options = $this->CurrencyService->select();
        $this->currencies = collect($this->options)->keyBy('value')->toArray();
        $this->name = $name;
        $this->value = $value;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.currency-select');
    }
}
