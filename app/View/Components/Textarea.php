<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;
    public $id;
    public $rows;

    public function __construct(string $name, string $id, int $rows = 5)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->rows = $rows;
    }

    public function render()
    {
        return view('components.textarea');
    }
}
