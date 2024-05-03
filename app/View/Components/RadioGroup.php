<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $filterName,
        public array $options,
        public ?bool $allOption = true,
        public ?string $value = null

        // ['entry', 'senior'] normal array
        // 0,        1

        // ['Entry' => 'entry', 'Senior' => 'senior'] assosiative array
        ) {
            //
        }
    
        public function optionsWithLabels(): array // this function to combine the the normal options array to be an assosiative array
        {
            return array_is_list($this->options) ? // array_is_list to check the passed array is not an assosiative array
                array_combine($this->options, $this->options) // so make it an assosiative array, array_combine lets as to make an array by passing the $keys($this->options) and the $values($this->options), the new array now are ['entry' => 'entry', 'senior' => 'senior']
                : $this->options;
        }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-group');
    }
}
