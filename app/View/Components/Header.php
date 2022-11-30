<?php

namespace App\View\Components;

use App\Models\Information;
use App\Models\Program;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header', [
            'programs'    => Program::all(),
            'information' => Information::first(),
        ]);
    }
}
