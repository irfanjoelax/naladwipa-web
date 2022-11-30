<?php

namespace App\View\Components;

use App\Models\Essay;
use App\Models\Information;
use App\Models\Program;
use Illuminate\View\Component;

class Footer extends Component
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
        return view('components.footer', [
            'information' => Information::first(),
            'programs'    => Program::all(),
            'essays'      => Essay::limit(3)->latest()->get(),
        ]);
    }
}
