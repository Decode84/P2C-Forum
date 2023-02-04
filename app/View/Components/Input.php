<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $id;
    public $type;
    public $value;

    public function __construct(string $name, string $id, string $type, string $value)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = old($name, $value ?? '');
    }

    public function render()
    {
        return view('components.input');
    }
}
