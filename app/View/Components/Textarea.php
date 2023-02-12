<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    
    private string $label;
    private string $field;
    private string $value;
    private string $placeholder;

    public function __construct(string $label, string $field, string $placeholder, string $value = ""){
        $this->label = $label;
        $this->field = $field;
        $this->value = $value;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    { 
        return view('components.textarea', [
            "label" => $this->label,
            "field" => $this->field,
            "value" => $this->value,
            "placeholder" => $this->placeholder
        ]);
    }
}
